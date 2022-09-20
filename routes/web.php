<?php

use App\Http\Controllers\dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class , 'index']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardHomeController::class , 'index'])->name('dashboard');
    Route::resource('dashboard/services' , ServiceController::class);
});

require __DIR__.'/auth.php';


// Home routes



// Dashboard Routes
