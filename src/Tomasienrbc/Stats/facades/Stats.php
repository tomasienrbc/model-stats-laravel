<?php namespace Tomasienrbc\Stats\Facades;

use Illuminate\Support\Facades\Facade;

class Stats extends Facade {
	protected static function getFacadeAccessor() {return "stats";}
}
