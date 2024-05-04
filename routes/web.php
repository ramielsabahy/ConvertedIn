<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatisticsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([
    'middleware' => ['auth:sanctum'],
    config('jetstream.auth_session'),
    'verified',
    'namespace' => 'App\Http\Controllers',
], function (){
    Route::group(['name' => 'tasks.'], function () {
        Route::resource('tasks', TaskController::class);
    });
    Route::get('statistics', 'StatisticsController@index')->name('statistics');
});
