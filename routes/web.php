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
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\GoodsSelectController;
use App\Http\Controllers\ItemCompleteController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MessageSelectController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\RegistrationCompleteController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RequestMessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\MypageBeforeController;
use App\Http\Controllers\PasswordChangeCompleteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageSubmitController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\RatingSubmitController;
use App\Http\Controllers\RequestAnswerController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\WaitController;
use App\Http\Controllers\RequestSelectController;
use App\Http\Controllers\MessageReceivedController;
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

//追加福田
Route::get('/', [TopController::class, 'index'])->name('top');


Route::prefix('sample')->name('sample')->group(function () {
    Route::controller(SampleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

// プライバシーポリシー
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');

// 福田お問い合わせページ作成
Route::get('/inquirery', [InquireryController::class, 'index'])->name('inquirery');

// 利用規約
// // 利用規約
Route::get('/agreements', [AgreementsController::class, 'index'])->name('agreements');

// mypageBefore
Route::get('/mypageBefore', [MypageBeforeController::class, 'index'])->name('mypagebefore');

// ログイン前の出品
Route::get('/postbefore', [PostBeforeController::class, 'index'])->name('postbefore');

// 検索
Route::get('/seach', [SeachController::class, 'index'])->name('seach');
Route::post('/seach', [SeachController::class, 'read'])->name('search.result');

// ログイン前のメッセージ
Route::get('/messagebefore', [MessageBeforeController::class, 'index'])->name('messagebefore');

//ログイン前申請不可メッセージページ
Route::get('/applicationnot', [ApplicationNotController::class, 'index'])->name('applicationnot');
//パスワード変更ページ
// Route::get('/passwordchange', [PasswordChangeController::class, 'index'])->name('passwordchange');
//新規登録変更完了ページ
// Route::get('/registrationcomplete', [RegistrationCompleteController::class, 'index']);

//リクエスト画面ページ
Route::get('/requestmessage', [RequestMessageController::class, 'index']);

//メッセージ選択画面ページ
Route::get('/messageselect', [MessageSelectController::class, 'index'])->name('messageselect');
Route::post('/messageselect', [MessageSelectController::class, 'start_talk'])->name('startTalk');


//交換完了確認ページ
Route::get('/exchangecondition', [ExchangeConditionController::class, 'index'])->name('exchange');
Route::post('exchangecondition/complete', [ExchangeConditionController::class, 'complete'])->name('exchange.complete');

//  画面遷移のテンプレートとして使ってください
//ログイン画面
// Route::get('/userlogin', [LoginController::class, 'index'])->name('userlogin');

// パスワード変更完了
// Route::get('/passwordchangecomplete', [PasswordChangeCompleteController::class, 'index']);

// 出品画面
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store'])->name('post.store');

// メッセージ送信画面
Route::get('/messagesubmit', [MessageSubmitController::class, 'index']);

// 交換完了送信画面 /{id}
Route::get('/rating/{id?}', [RatingController::class, 'index'])->name('rating');
Route::post('/rating/{id?}', [RatingController::class, 'store'])->name('rating.store');

// メッセージ取引画面
Route::get('/message', [MessageController::class, 'index'])->name('message');
Route::post('/message/send', [MessageController::class, 'create_message'])->name('create_message');
Route::post('/message/complete', [MessageController::class, 'complete'])->name('message.complete');
Route::post('/message/edit',[MessageController::class, 'update'])->name('message.update');
Route::post('/message/delete',[MessageController::class, 'delete'])->name('message.delete');

//ログイン後マイページ
Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
Route::patch('/mypage/icon', [MypageController::class, 'updateIcon'])->name('profile.update_icon');

// マッチ申請
Route::get('/match', [MatchController::class, 'index'])->name('match');
Route::post('/match', [MatchController::class, 'start_deal'])->name('match.start_deal');

// 交換確認リクエスト画面
Route::get('/requestanswer', [RequestAnswerController::class, 'index'])->name('requestanswer');
Route::post('/requestanswer/make_match', [RequestAnswerController::class, 'make_match'])->name('requestanswer.make_match');
Route::post('/requestanswer/delete', [RequestAnswerController::class, 'delete'])->name('requestanswer.delete');

//リクエストメッセージ申請ページ作成

Route::post('/request', [RequestController::class, 'index'])->name('request');
Route::post('/request/store', [RequestController::class, 'store'])->name('request.store');


// 新規登録画面
// Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
// Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');


//tailwindテストページ
Route::get('/test', [TestController::class, 'index']);



//商品詳細ページ作成03-07

Route::get('/goods/{id}', [GoodsController::class, 'show'])->name('goods');
Route::post('/goods/select', [GoodsController::class, 'select'])->name('goods.select');

//評価送信ページ作成03-07
Route::get('/ratingsubmit', [RatingSubmitController::class, 'index'])->name('ratingsubmit');

//商品出品リクエスト待ちページ作成03-07
Route::get('/wait', [WaitController::class, 'index'])->name('wait');

// リクエストセレクトコントローラー
Route::get('/requestSelect', [RequestSelectController::class, 'index'])->name('requestSelect');

//福田出品中の商品ページ
Route::get('/listing', [ListingController::class, 'index'])->name('listing');
Route::delete('/listing/{listedItem}', [ListingController::class, 'destroy'])->name('listing.destroy');

//お気に入り商品ページ
Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite');
Route::middleware(['auth'])->group(function () {

    // お気に入り登録：POST送信
    // {listed_item_id} の部分は、ボタンが押された商品のIDが自動で入ります
    Route::post('/goods/{listed_item_id}/favorite', [FavoriteController::class, 'store'])
        ->name('favorites.store');

    // お気に入り解除：DELETE送信
    Route::delete('/goods/{listed_item_id}/unfavorite', [FavoriteController::class, 'destroy'])
        ->name('favorites.destroy');
});

// --- 追記・修正部分 ---

// 1. 商品選択画面の表示
Route::get('/goodsselect', [GoodsSelectController::class, 'index'])->name('goodsselect');
Route::post('/goodsselect/select', [GoodsSelectController::class, 'select'])->name('goodsselect.select');

Route::get('/request/confirm', function () {
    return view('request');
})->name('request.confirm');

Route::get('/messageReceived', [MessageReceivedController::class, 'index'])->name('messageReceived');

// --- ここまで ---


//マニュアルページ作成
Route::get('/manual', [ManualController::class, 'index'])->name('manual');

//取引完了商品表示ページ
Route::get('/itemcomplete', [ItemCompleteController::class, 'index'])->name('itemcomplete');

// 佐藤のテストページ
use App\Http\Controllers\SatoTestController;
Route::get('/satoTest',[SatoTestController::class,'index'])->name('satoTest');
Route::post('/satoTest/markAsRead',[SatoTestController::class,'markAsRead'])->name('satoTest.markAsRead');

//東郷先生記述
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/notifications/{id}/read', [MessageReceivedController::class, 'read'])->name('messageReceived.read');
});

require __DIR__ . '/auth.php';
