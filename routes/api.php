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

Route::get('test/insert', 'TestController@insert');  
Route::get('test/delete', 'TestController@delete');  
Route::get('test/update', 'TestController@update');  
Route::get('test/select', 'TestController@select'); 
Route::get('test/selectPaginate', 'TestController@selectPaginate'); 

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
            Route::get('get', 'Admin\Company@getNewsById');
            Route::get('list', 'Admin\Company@getNewsList');
            Route::post('set', 'Admin\Company@setNews');
            Route::post('del', 'Admin\Company@delNews');
        });
    });

    Route::group(['prefix' => 'feedback'], function () {
        Route::get('list', 'Admin\Feedback@list');
        Route::get('delete', 'Admin\Feedback@delete');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::group(['prefix' => 'nav'], function () {
            Route::post('set', 'Admin\Products\nav@set');
            Route::get('del', 'Admin\Products\nav@del');
            Route::get('get', 'Admin\Products\nav@get');
        });
        
        // Route::post('nav/set', 'Admin\products@set');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::group(['prefix' => 'item'], function () {
            Route::post('set', 'Admin\Products\item@set');
            Route::get('del', 'Admin\Products\item@del');
            Route::get('get', 'Admin\Products\item@get');
        });
        
        // Route::post('nav/set', 'Admin\products@set');
    });

    Route::group(['prefix' => 'image'], function () {
        Route::post('upload', 'Admin\Image@upload');
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'company'], function () {
        Route::get('info', 'Main\Company@info');
        Route::get('history/list', 'Main\Company@historyList');
        Route::get('news/list', 'Main\Company@newsList');
        Route::get('news/get', 'Main\Company@getNewsById');
    });
    Route::post('feedback/submit', 'Main\Feedback@submit');
    Route::get('products/nav/get', 'Main\Products\nav@get');
    Route::get('products/nav/item', 'Main\Products\item@get');
});
