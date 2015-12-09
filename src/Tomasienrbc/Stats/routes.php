<?php


Route::group(array('prefix' => 'models'), function() {
	//View Calls
	View::addNamespace('stats', __DIR__.'/views');
	Route::get("stats", function() {
		return View::make("stats::stats");
	});

//AJAX Calls
Route::group(array('before' => 'ajax'), function() {
			Route::get("models","Tomasienrbc\Stats\ModelStatsController@models");
			Route::get('model_stats', "Tomasienrbc\Stats\ModelStatsController@model_stats");
});
});
