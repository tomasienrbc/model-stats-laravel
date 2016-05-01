<?php namespace Tomasienrbc\Stats;

use \App\Http\Controllers\Controller as Controller;
use \Carbon\Carbon;
use \Input;
use Log;
use \DateTime;

class ModelStatsControllerLaravel5 extends Controller {

	// get Model Names for AJAX Call to front end on initial load
	public function models() {
		$models = $this->getModelNames();
		return $models;
	}

  // routing function for taking in Inputs and returning model stats
	public function model_stats() {

		$models = Input::get("models");
		$start = Input::get("date_range_start");
		$end = Input::get("date_range_end");
		$time_type = "".Input::get("time_type")."_at";
		$date_format = Input::get("date_format");
		$return = $this->getModelCounts($models, $time_type, $start, $end,$date_format);
		return $return;
	}

  // for any given model in any given time period, return the grouped counts by day
	private function getModelCounts($model,$time_type,$start,$end,$date_format) {
		// get list of Model names
		$return = array();

		// if we got models, do things. Else, kill, eventually try again
		$count = $this->countModelsByTime($time_type,$model,$start,$end,$date_format);
		$return[$model] = $count;
		return $return;
	}

	// get list of Model names
	private function getModelNames() {
		$path = app_path() . "/Models";
		$out=array();
		if(file_exists($path)) {
			$results = scandir($path);
			foreach($results as $result) {
				if($result === '.' or $result === '..' or $result[0] === '.') continue;
				$filename = $result;
				if(is_dir($filename)) {
					$out = array_merge($out, getModelNames($fileName));
				} else {
					$out[] = substr($filename,0,-4);
				}
			}
			return $out;
		} else {
			return false;
		}
	}

	// get count by day based on time attribute such as "created_at" or "updated_at"
	private function countModelsByTime($attr,$model_raw,$first,$last,$date_format) {

		$model = "\\".$model_raw;
		date_default_timezone_set('America/New_York');
		$today = date('Y-m-d');
		$GLOBALS['date_format'] = $date_format;
		// Get the information requested
		$days_fetch = $model::select($attr)
				->whereBetween((string)$attr, array(new DateTime($first), new DateTime($last)))
				->orderBy('created_at', 'asc')
				->get();
		$days_fetch_grouped = $days_fetch->groupBy(function($date) {
			return Carbon::parse($date->created_at)->format($GLOBALS['date_format']);
		});
		$today_fetch = $model::select($attr)
			->whereRaw('date(created_at) = ?', [Carbon::now()->format('Y-m-d')] )
			->get();
		$days = array();
		foreach ($days_fetch_grouped as $key => $value) {
			$days["days"][$key] = count($days_fetch_grouped[$key]);
			$days["total"] = count($days_fetch);
			$days["today"] = count($today_fetch);
		}
	// Also get the total in the range and today
		 return $days;
	}
}
