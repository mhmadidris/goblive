<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Route::post('subscribe/{channel}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
// Route::post('unsubscribe/{channel}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

Route::resource('/', HomeController::class);

Route::get('livestream', [YoutubeController::class, 'getLivestreams'])->name('youtube.livestreams');
Route::get('/livestream/{id}', [YoutubeController::class, 'show'])->name('livestream.show');

Route::resource('/video', VideoController::class);

Route::get('channel/{username}', [ChannelController::class, 'show'])->name('channel.show');

Route::get('/about', function () {
    return view('pages.front.about');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::name('mychannel.')->prefix('mychannel')->group(function () {
        Route::resource('/', ChannelController::class)->except(['update']);
        Route::put('/{id}', [ChannelController::class, 'update'])->name('update');

        Route::resource('video', VideoController::class);
        // Route::get('/video/{url}', [VideoController::class, 'show'])->name('video.show');

        Route::get('detail', function () {
            return view('pages.front.detail-video');
        });
    });
});

// Route::middleware('auth')->group(function () {
//     Route::post('/subscribe/{channel}', 'SubscriptionController@subscribe')->name('subscribe');
//     Route::post('/unsubscribe/{channel}', 'SubscriptionController@unsubscribe')->name('unsubscribe');
// });