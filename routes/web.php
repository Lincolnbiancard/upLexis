<?php


/*
|--------------------------------------------------------------------------
|  Routes to user auth
|--------------------------------------------------------------------------
|
*/

Route::get('/login', 'DashboardController@login');
Route::post('login', [ 'as' => 'login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');

/*
|--------------------------------------------------------------------------
|  Routes Middleware Auth
|--------------------------------------------------------------------------
|
*/


Route::group(['middleware' => ['auth', 'auth.unique.user']], function(){


/*
|--------------------------------------------------------------------------
|  Routes to Articles
|--------------------------------------------------------------------------
|  Rota para manipular artigos
|
*/

    Route::resource('/', 'ArticleController');

    Route::delete('destroy/{id}', 'ArticleController@destroy');

    Route::get('form', 'ArticleController@form');

    Route::get('curl', 'ArticleController@curl');

    Route::post('search', 'ArticleController@search');

    // Logout
    Route::get('logout', 'DashboardController@getLogout');

});
