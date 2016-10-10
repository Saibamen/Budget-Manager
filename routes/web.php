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
    Route::get("budget/{type_id?}", ["as" => "budget.list", "uses" => "BudgetController@index"])->where(["type_id" => "[0-9]+"]);

    Route::get("budget/add", ["as" => "budget.addform", "uses" => "BudgetController@showAddEditForm"]);
    Route::post("budget/add", ["as" => "budget.postadd", "uses" => "BudgetController@store"]);
    Route::get("budget/edit/{id}", ["as" => "budget.editform", "uses" => "BudgetController@showAddEditForm"]
        );
    Route::post("budget/edit/{id}", ["as" => "budget.postedit", "uses" => "BudgetController@store"]);

    Route::get("source/{type_id?}", ["as" => "source.index", "uses" => "SourceController@index"])->where(["type_id" => "[0-9]+"]);
    Route::get("source/add", ["as" => "source.addform", "uses" => "SourceController@showAddEditForm"]);
    Route::post("source/add", ["as" => "source.postadd", "uses" => "SourceController@store"]);
    Route::get("source/edit/{id}", ["as" => "source.editform", "uses" => "SourceController@showAddEditForm"]
        );
    Route::post("source/edit/{id}", ["as" => "source.postedit", "uses" => "SourceController@store"]);

    //Route::get("/stats", ["as" => "stats.index", "uses" => "StatController@index"]);
});
