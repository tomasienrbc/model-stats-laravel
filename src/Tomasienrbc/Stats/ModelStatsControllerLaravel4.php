<?php namespace Tomasienrbc\Stats;

// use App\User;
use \BaseController;
use \Carbon\Carbon;
use \Input;
use Log;
use \DateTime;
use \DB;

class ModelStatsControllerLaravel4 extends BaseController {
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
		// you probably don't need the pre-string - Peter
		$time_type = "".Input::get("time_type")."_at";
		$date_format = Input::get("date_format");
		$return = $this->getModelCounts($models, $time_type, $start, $end,$date_format);
		return $return;
	}

	// get list of Model names
	private function getModelNames() {
		/// Open the actual file and grep for class to be more precise
		$path = app_path() . "/models";
		$out = array();
		if(getenv('DEFAULT_MODEL')) {
			$out["default"] = getenv('DEFAULT_MODEL');
		}
		if (file_exists($path)) {
			$results = scandir($path);
			foreach ($results as $result) {
				if ($result === '.' or $result === '..'  or $result[0] === '.') continue;
				$filename = $result;
				if (is_dir($filename)) {
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

	// for any given model in any given time period, return the grouped counts by day
	private function getModelCounts($model,$time_type,$start,$end,$date_format) {
		// get list of Model names
		$response = array();

		// if we got models, do things. Else, kill, eventually try again
		$count = $this->countModelsByTime($model,$time_type,$start,$end,$date_format);
		$response[$model] = $count;
		return $response;
	}

	// get count by day based on time attribute such as "created_at" or "updated_at"
	private function countModelsByTime($model_raw,$attr,$first,$last,$date_format) {

		if($date_format == "month") {
			$date_query_format = "%Y-%m";
		} else {
			$date_query_format = "%Y-%m-%d";
		}

		$model = "\\".$model_raw;
		date_default_timezone_set('America/New_York');
		$today = date('Y-m-d');
		// Get the information requested
		$days_fetch = $model::whereBetween((string)$attr, array(new DateTime($first), new DateTime($last)))
			->groupBy('date')
			->orderBy('date', 'DESC')
			->get(array(
					DB::raw('DATE_FORMAT(created_at,"'.$date_query_format.'") as date'),
					DB::raw('COUNT(*) as "count"')
		));
		$today_fetch = $model::select($attr)
			->whereRaw('date(created_at) = ?', [Carbon::now()->format('Y-m-d')] )
			->get();

		$days = array();
		$days["dates"] = $days_fetch;
		$total = 0;
		foreach ($days_fetch as $date) {
			$total += $date["count"];
		}
		$days["total"] = $total;
		$days["today"] = count($today_fetch);
	// Also get the total in the range and today
		 return $days;
	}
}
