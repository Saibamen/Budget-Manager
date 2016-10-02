<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group(["middleware" => "auth"], function () {
	Route::get("/", ["as" => "budget.index", "uses" => "BudgetController@index"]);

	Route::get("source", ["as" => "source.index", "uses" => "SourceController@index"]);
	Route::get("source/add", ["as" => "source.save", "uses" => "SourceController@save"]);

	//Route::get("/stats", ["as" => "stats.index", "uses" => "StatController@index"]);
});
