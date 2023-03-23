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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'show']);
Route::get('/countries', [\App\Http\Controllers\CountryController::class, 'list']);
Route::get('/cities', [\App\Http\Controllers\CityController::class, 'list']);
//Route::get('/cities/{city_id}', [\App\Http\Controllers\CityController::class, 'view']);