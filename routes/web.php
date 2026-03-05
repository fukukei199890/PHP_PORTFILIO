<?php

use App\Http\Controllers\InquireryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SampleController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SeachController;
use App\Http\Controllers\MessageBeforeController;

use App\Http\Controllers\PostBeforeController;
use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\ApplicationNotController;
use App\Http\Controllers\ExchangeConditionController;
use App\Http\Controllers\MessageSelectController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\RegistrationCompleteController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RequestMessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageBeforeController;
use App\Http\Controllers\PasswordChangeCompleteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageSubmitController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MatchController;

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
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');

// 福田お問い合わせページ作成
Route::get('/inquirery', [InquireryController::class, 'index']);

// 利用規約
// // 利用規約
Route::get('/agreements', [AgreementsController::class, 'index'])->name('agreements');

// mypageBefore
Route::get('/mypageBefore', [MypageBeforeController::class, 'index']);

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

//  画面遷移のテンプレートとして使ってください
//ログイン画面
Route::get('/login', [LoginController::class, 'index'])->name('login');

// パスワード変更完了
Route::get('/passwordchangecomplete', [PasswordChangeCompleteController::class, 'index']);

// 出品画面
Route::get('/post', [PostController::class, 'index']);

// メッセージ送信画面
Route::get('/messagesubmit', [MessageSubmitController::class, 'index']);

// 交換完了送信画面
Route::get('/eeeee', [RatingController::class, 'index'])->name('rating');

// メッセージ取引画面
Route::get('/message', [MessageController::class, 'index'])->name('message');

//ログイン後マイページ
Route::get('/mypage', [MypageController::class, 'index']);

Route::get('/match', [MatchController::class, 'index'])->name('match');


// 新規登録画面
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');




//東郷先生記述
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
