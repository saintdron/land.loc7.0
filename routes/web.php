<?php

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

Route::match(['get', 'post'], '/', ['uses' => 'IndexController@execute', 'as' => 'index']);
Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);

Route::auth();

// admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        if (view()->exists('admin.index')) {
            $data = [
                'title' => 'Панель администратора'
            ];
            return view('admin.index', $data);
        }
    });

    // admin/pages
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);

        // admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PagesAddController@execute', 'as' => 'pagesAdd']);

        // admin/pages/edit/{page}
        Route::match(['get', 'post', 'delete'], '/edit/{page}',
            ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);
    });

    // admin/portfolio
    Route::group(['prefix' => 'portfolio'], function () {
        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);

        // admin/portfolio/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PortfolioAddController@execute', 'as' => 'portfolioAdd']);

        // admin/portfolio/edit/{portfolio}
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}',
            ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolioEdit']);
    });

    // admin/services
    Route::group(['prefix' => 'services'], function () {
        Route::get('/', ['uses' => 'ServicesController@execute', 'as' => 'services']);

        // admin/services/add
        Route::match(['get', 'post'], '/add', ['uses' => 'ServicesAddController@execute', 'as' => 'servicesAdd']);

        // admin/services/edit/{service}
        Route::match(['get', 'post', 'delete'], '/edit/{service}',
            ['uses' => 'ServicesEditController@execute', 'as' => 'servicesEdit']);
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
