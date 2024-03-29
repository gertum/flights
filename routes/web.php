<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',\App\Http\Livewire\Home::class);
Route::get('/port', \App\Http\Livewire\ShowPorts::class);
Route::get('/flight', \App\Http\Livewire\ShowFlights::class);


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'show']);
Route::get('/countries', [\App\Http\Controllers\CountryController::class, 'list']);
Route::get('/cities', [\App\Http\Controllers\CityController::class, 'list']);
//Route::get('/cities/{city_id}', [\App\Http\Controllers\CityController::class, 'view']);

