<?php

use App\Http\Controllers\InquireryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SampleController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SeachController;
use App\Http\Controllers\MessageBeforeController;

use App\Http\Controllers\PostBeforeController;
use App\Http\Controllers\AgreementsController;

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

// プライバシーポリシー
Route::get('/privacy', [PrivacyController::class, 'index']);

//福田お問い合わせページ作成
Route::get('/inquirery', [InquireryController::class, 'index']);

// 利用規約
// // 利用規約
Route::get('/agreements', [AgreementsController::class, 'index']);

// ログイン前の出品
Route::get('/postbefore', [PostBeforeController::class, 'index']);

Route::get('/seach', [SeachController::class, 'index']);

Route::get('/messagebefore', [MessageBeforeController::class, 'index']);
