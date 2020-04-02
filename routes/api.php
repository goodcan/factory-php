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

    Route::group(['prefix' => 'workshop'], function () {
        Route::post('set', 'Admin\Workshop@set');
        Route::get('del', 'Admin\Workshop@del');
        Route::get('get', 'Admin\Workshop@get');
    });
    
    Route::group(['prefix' => 'customer'], function () {
        Route::post('set', 'Admin\Customer@set');
        Route::get('del', 'Admin\Customer@del');
        Route::get('get', 'Admin\Customer@get');
    });

    Route::group(['prefix' => 'faq'], function () {
        Route::post('set', 'Admin\Faq@set');
        Route::get('del', 'Admin\Faq@del');
        Route::get('get', 'Admin\Faq@get');
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
    Route::get('products/item/get', 'Main\Products\item@get');
    Route::get('workshop/get', 'Main\Workshop@get');
    Route::get('customer/get', 'Main\Customer@get');
    Route::get('faq/get', 'Main\Faq@get');
});


Route::post('user/login', function(){
    $password = Input::get('password');
  
    if( $password === 'pengxiaoji' ){
      return ['code'=>20000,'data'=>['token'=>"admin-token"]] ;
    }else{
      return ['code'=>0,'data'=>['message'=>"password error"]] ;
    }
  });
 
 
  Route::get('user/info', function(){
   return ['code'=>20000,'data'=>[
         'roles'=> ['admin'],
     'introduction'=> 'I am a super administrator',
     'avatar'=> 'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif',
     'name'=> 'Super Admin'
   ]] ;
  });
 Route::POST('user/logout', function(){
 
   return ['code'=>20000,'data'=>'success'] ;
  });