<?php

use Illuminate\Support\Facades\Route;
//add code
use App\Http\Controllers\TweetController;

// 🔽 追加
use App\Http\Controllers\FavoriteController;

// 🔽 追加
use App\Http\Controllers\FollowController;
// 🔽 追加
use App\Http\Controllers\SearchController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/password/change', [ChangePasswordController::class,'edit']);
    Route::patch('/password/change',[ChangePasswordController::class,'update'])->name('password.change');
    // 🔽 追加（検索画面）
    Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
    // 🔽 追加（検索処理）
    Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');
     // 🔽 追加
    Route::get('/tweet/timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');
    // 🔽 追加
    Route::get('user/{user}', [FollowController::class, 'show'])->name('follow.show');

    // 🔽 追加
    Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
    // 🔽 追加
    Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
    // 🔽 追加
    Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');

    // 🔽 追加
    Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');

    //add
    Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
    Route::resource('tweet', TweetController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
