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

Route::get("/", function () {
    return view("welcome");
});

Auth::routes();

Route::get("home", "HomeController@index");

Route::get("/", ["as" => "budget.index", "uses" => "BudgetController@index"]);

Route::get("/source", ["as" => "source.index", "uses" => "SourceController@index"]);

//Route::get("/stats", ["as" => "stats.index", "uses" => "StatController@index"]);
