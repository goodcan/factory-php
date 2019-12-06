<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'company'], function () {
        Route::get('getInfo', 'Admin\Company@getInfo');
        Route::post('setInfo', 'Admin\Company@setInfo');

        Route::group(['prefix' => 'history'], function () {
            Route::get('list', 'Admin\Company@getHistoryList');
            Route::post('set', 'Admin\Company@setHistory');
            Route::post('del', 'Admin\Company@delHistory');
        });

        Route::group(['prefix' => 'news'], function () {
            Route::get('list', 'Admin\Company@getNewsList');
            Route::post('set', 'Admin\Company@setNews');
            Route::post('del', 'Admin\Company@delNews');
        });
    });

    Route::post('feedback/list', 'Main\Feedback@getList');

    Route::group(['prefix' => 'image'], function () {
        Route::post('upload', 'Admin\Image@upload');
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'company'], function () {
        Route::get('info', 'Main\Company@info');
        Route::get('history/list', 'Main\Company@historyList');
        Route::get('news/list', 'Main\Company@newsList');
    });
    Route::post('feedback/submit', 'Main\Feedback@submit');
});
