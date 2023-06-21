<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ChannelController;

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

Route::resource('/', HomeController::class);

Route::resource('/video', VideoController::class);

Route::get('/about', function () {
    return view('pages.front.about');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::name('mychannel.')->prefix('mychannel')->group(function () {
        Route::resource('/', ChannelController::class);
    });
});
