<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SampleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('sample')->name('sample')->group(function () {
    Route::controller(SampleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
