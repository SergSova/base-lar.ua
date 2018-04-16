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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Локализация
Route::get(
    'setlocale/{lang}',
    function ($lang) {

        $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
        $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

        //разбиваем на массив по разделителю
        $segments = explode('/', $parse_url);

        //Если URL (где нажали на переключение языка) содержал корректную метку языка
        if (in_array($segments[1], App\Http\Middleware\Locale::$languages)) {

            unset($segments[1]); //удаляем метку
        }

        //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
        if ($lang != App\Http\Middleware\Locale::$mainLanguage) {
            array_splice($segments, 1, 0, $lang);
        }

        //формируем полный URL
        $url = Request::root().implode("/", $segments);

        //если были еще GET-параметры - добавляем их
        if (parse_url($referer, PHP_URL_QUERY)) {
            $url = $url.'?'.parse_url($referer, PHP_URL_QUERY);
        }

        return redirect($url); //Перенаправляем назад на ту же страницу

    }
)->name('setlocale');

Route::group(
    ['prefix' => App\Http\Middleware\Locale::getLocale()/*, 'middleware' => 'reconstr'*/],
    function () {
        Route::get('/', 'Site\SiteController@index')->name('home');
        Route::get('/aids', 'Site\SiteController@aids')->name('aids');
        Route::get('/slide-bubles', 'Site\SiteController@slideBubles');
        Route::get('/slide-rocket', 'Site\SiteController@slideRocket');
        Route::get('/with-who', 'Site\SiteController@withWho');
        Route::get('/bandit', 'Site\SiteController@bandit')->name('bandit');
        Route::get('/condoms-white', 'Site\SiteController@condomsWhite')->name('condoms');
        Route::get('/consultants', 'Site\SiteController@consultants')->name('consult');
        Route::get('/about', 'Site\SiteController@about')->name('about');
        Route::get('/aids-test', 'Site\SiteController@testPage')->name('test');
        Route::get('/faq/{index_faq?}', 'Site\SiteController@faq')->name('faq');
        Route::get('/map', 'Site\SiteController@map')->name('map');

        //BLOG
        Route::group(
            ['prefix' => 'blog'],
            function () {
                Route::get('/', 'Site\BlogController@index')->name('blog');
                Route::get('/{category}', 'Site\BlogController@index')->name('blog.fitred');
                Route::get('/{category}/{article}', 'Site\BlogController@view')->name('blogArticle');
            }
        );
        Route::any('/search/{search}', 'Site\SearchController@search')->name('search');
    }
);




Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Role
Route::group(
    ['middleware' => ['role:super-admin']],
    function () {
        Route::get('role/set/{user}/{role}', 'Auth\AuthController@setRole')->name('setRole');
        Route::get('role/unset/{user}/{role}', 'Auth\AuthController@unsetRole')->name('unsetRole');
        Route::delete('user/destroy/{user}', 'Auth\AuthController@destroyUser')->name('destroyUser');

        Route::get('user/status/{user}/{status}', 'Auth\AuthController@userStatus')->name('userStatus');

        Route::group(
            ['prefix' => 'admin'],
            function () {

                Route::get('/statistic', 'Site\StaticticController@view')->name('statistic');
//        Route::get('/', 'Admin\IndexController@index')->name('admin');
                Route::get('/', 'Admin\StaticPageController@index')->name('admin');
                Route::get('/static', 'Admin\StaticPageController@index')->name('staticPage');
                Route::get('/static/edit/{staticPage}/{name}','Admin\StaticPageController@edit')
                    ->name('staticPageView')->where(['staticPage' => '[0-9]+']);
                Route::post('/static/edit/{staticPage}/{name}','Admin\StaticPageController@edit')
                    ->name('staticPageEdit')->where(['staticPage' => '[0-9]+']);

                Route::resource('/blog', 'Admin\BlogController');
                Route::resource('/blog-category', 'Admin\BlogCategoryController');

                Route::get('/blog/pub/{post}', 'Admin\BlogController@pub')->name('blog.pub');
                Route::post('/blog/restore/{post_id}', 'Admin\BlogController@restore')->name('blog.restore')->where(['post_id' => '[0-9]+']);
                Route::delete('/blog-clear/{blog?}', 'Admin\BlogController@removeAll')->name('blog.clear');

            }
        );

    }
);

Route::post('/statistic/save', 'Site\StaticticController@save');

// OAuth Routes
Route::get('oauth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('oauth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
