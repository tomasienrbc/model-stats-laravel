<?php

Route::group(array('prefix' => 'models'), function() {
	$laravel = app();
	$lv =  $laravel::VERSION;
	//View Calls
	View::addNamespace('stats', __DIR__.'/views');
	Route::get("stats", function() {
		return View::make("stats::stats");
	});

//AJAX Calls

	if($lv > 4 && $lv < 5) {
		Route::group(array('before' => 'ajax'), function() {
					Route::get("models","Tomasienrbc\Stats\ModelStatsControllerLaravel4@models");
					Route::get('model_stats', "Tomasienrbc\Stats\ModelStatsControllerLaravel4@model_stats");
		});
	} else if($lv >= 5) {
		Route::group(array('before' => 'ajax'), function() {
					Route::get("models","Tomasienrbc\Stats\ModelStatsControllerLaravel5@models");
					Route::get('model_stats', "Tomasienrbc\Stats\ModelStatsControllerLaravel5@model_stats");
		});
	}
});
