<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatisticsController;

Route::group([
    'middleware' => ['auth:sanctum'],
    config('jetstream.auth_session'),
    'verified',
    'namespace' => 'App\Http\Controllers',
], function (){
    Route::get('/', 'TaskController@index');
    Route::group(['name' => 'tasks.'], function () {
        Route::resource('tasks', TaskController::class)->only('index', 'create');
    });
    Route::get('statistics', 'StatisticsController@index')->name('statistics');
});
