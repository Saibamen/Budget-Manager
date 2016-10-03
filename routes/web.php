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
    Route::get("budget/add", ["as" => "budget.addform", "uses" => "BudgetController@showAddEditForm"]);
    Route::post("budget/add", ["as" => "budget.postadd", "uses" => "BudgetController@showAddEditForm"]);
    Route::get("budget/edit/{id}", ["as" => "budget.editform", "uses" => "BudgetController@showAddEditForm"]
        );
    Route::post("budget/edit/{id}", ["as" => "budget.postedit", "uses" => "BudgetController@showAddEditForm"]);

    Route::get("source", ["as" => "source.index", "uses" => "SourceController@index"]);
    Route::get("source/add", ["as" => "source.addform", "uses" => "SourceController@showAddEditForm"]);
    Route::post("source/add", ["as" => "source.postadd", "uses" => "SourceController@showAddEditForm"]);
    Route::get("source/edit/{id}", ["as" => "source.editform", "uses" => "SourceController@showAddEditForm"]
        );
    Route::post("source/edit/{id}", ["as" => "source.postedit", "uses" => "SourceController@showAddEditForm"]);

    //Route::get("/stats", ["as" => "stats.index", "uses" => "StatController@index"]);
});
