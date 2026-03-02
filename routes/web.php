<?php

use App\Http\Controllers\InquireryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SampleController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SeachController;
use App\Http\Controllers\PostBeforeController;
use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\MessageBeforeController;
use App\Http\Controllers\ApplicationNotController;
use App\Http\Controllers\ExchangeConditionController;
use App\Http\Controllers\MessageSelectController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\RegistrationCompleteController;
use App\Http\Controllers\RequestMessageController;

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

// 福田お問い合わせページ作成
Route::get('/inquirery', [InquireryController::class, 'index']);

// 利用規約
Route::get('/agreements', [AgreementsController::class, 'index']);

// ログイン前の出品
Route::get('/postbefore', [PostBeforeController::class, 'index']);

// 検索
Route::get('/seach', [SeachController::class, 'index']);

// ログイン前のメッセージ
Route::get('/messagebefore', [MessageBeforeController::class, 'index']);

//ログイン前申請不可メッセージページ
Route::get('/applicationnot', [ApplicationNotController::class, 'index']);
//パスワード変更ページ
Route::get('/passwordchange', [PasswordChangeController::class, 'index']);
//新規登録変更完了ページ
Route::get('/registrationcomplete', [RegistrationCompleteController::class, 'index']);

//リクエスト画面ページ
Route::get('/requestmessage', [RequestMessageController::class, 'index']);

//メッセージ選択画面ページ
Route::get('/messageselect', [MessageSelectController::class, 'index']);


//交換完了確認ページ
Route::get('/exchangecondition', [ExchangeConditionController::class, 'index']);
