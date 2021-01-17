<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[App\Http\Controllers\MainController::class,'index'])->name('main');
Route::post('/main/store',[App\Http\Controllers\MainController::class,'store'])->name('main/store');

Route::get('/driver',[App\Http\Controllers\DriverController::class,'create'])->name('driver');
Route::post('/driver/store',[App\Http\Controllers\DriverController::class,'store'])->name('driver/store');

Route::get('/hire',[App\Http\Controllers\HireController::class,'index'])->name('hire');
Route::post('/hire/store',[App\Http\Controllers\HireController::class,'store'])->name('hire/store');


Route::get('/vehicle',[App\Http\Controllers\VehicleController::class,'create'])->name('vehicle');
Route::post('/vehicle/store',[App\Http\Controllers\VehicleController::class,'store'])->name('vehicle/store');


