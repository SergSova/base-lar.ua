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

        Route::group(
            ['prefix' => 'admin'],
            function () {

                Route::get('/statistic', 'Site\StaticticController@view')->name('statistic');
//        Route::get('/', 'Admin\IndexController@index')->name('admin');
                Route::get('/', 'Admin\StaticPageController@index')->name('admin');
                Route::get('/static', 'Admin\StaticPageController@index')->name('staticPage');
                Route::get('/static/edit/{staticPage}/{name}', 'Admin\StaticPageController@edit')
                    ->name('staticPageView')->where(['staticPage' => '[0-9]+']);
                Route::post('/static/edit/{staticPage}/{name}', 'Admin\StaticPageController@edit')
                    ->name('staticPageEdit')->where(['staticPage' => '[0-9]+']);

                Route::resource('/blog', 'Admin\BlogController');
                Route::resource('/blog-category', 'Admin\BlogCategoryController');

                Route::get('/blog/pub/{post}', 'Admin\BlogController@pub')->name('blog.pub');
                Route::post('/blog/restore/{post_id}', 'Admin\BlogController@restore')->name('blog.restore')->where(['post_id' => '[0-9]+']);
                Route::delete('/blog-clear/{blog?}', 'Admin\BlogController@removeAll')->name('blog.clear');

                Route::group(
                    ['prefix' => 'user'],
                    function () {
                        Route::get('/', 'Admin\UsersController@index')->name('user.index');
                        Route::get('/edit/{user}', 'Admin\UsersController@edit')->name('user.edit');
                        Route::post('/update/{user}', 'Admin\UsersController@update')->name('user.update');
                        Route::post('/status/{user}/{status}', 'Admin\UsersController@userStatus')->name('user.status');
                        Route::get('/role-set/{user_id}/{role}', 'Admin\UsersController@setRole')->name('user.setRole');
                        Route::get('/role-unset/{user_id}/{role}', 'Admin\UsersController@unsetRole')->name('user.unsetRole');
                        Route::delete('/destroy/{user_id}', 'Admin\UsersController@destroy')->name('user.destroy');
                    }
                ); //пользователи

                Route::resource('/country', 'Admin\CountryController'); //страны
                Route::resource('/city', 'Admin\CityController'); //города
                Route::post('/city-by-country/{country_id?}', 'Admin\CityController@cityByCountry')->name('cityByCountry'); //получить города по стране
                Route::resource('/dist', 'Admin\DistrictController'); //районы
                Route::post('/dist-by-city/{city_id?}', 'Admin\DistrictController@distByCity')->name('distByCity'); //получить район по городу

                Route::resource('/metro', 'Admin\MetroController'); //метро
                Route::post('/metro-by-city/{city_id?}', 'Admin\MetroController@metroByCity')->name('metroByCity'); //получить метро по городу

                Route::resource('/institution-categories', 'Admin\InstitutionCategoriesController'); //категории заведений
                Route::resource('/institution-sub-categories', 'Admin\InstitutionSubCategoriesController');
                Route::get('/institution-sub-categories/create/{parent_id?}', 'Admin\InstitutionSubCategoriesController@create')->name('institution-sub-categories.create');
                Route::post('/sub-cat-by-cat/{cat_id?}', 'Admin\InstitutionSubCategoriesController@subcatByCategory')->name('subcatByCategory');


                Route::resource('/mark', 'Admin\MarkController'); //Метки
                Route::get('/mark/create/{parent_id?}', 'Admin\MarkController@create')->name('mark.create');
                Route::resource('/criteria', 'Admin\CriteriaController'); //Метки
                Route::get('/criteria/create/{parent_id?}', 'Admin\CriteriaController@create')->name('criteria.create');
                Route::resource('/institution', 'Admin\InstitutionController'); //заведения

                Route::resource('/yammer', 'Admin\YammerController');//жалобы
                Route::resource('/review', 'Admin\ReviewController');//отзывы
                Route::resource('/comment', 'Admin\CommentController');//comment


                Route::resource('/gallery', 'Admin\InstGalleryController');
                Route::get('/gallery/create/{id}', 'Admin\InstGalleryController@create')->name('gallery.create');
                Route::get('/gallery/index/{id}', 'Admin\InstGalleryController@index')->name('gallery.index');

                Route::resource('/inst', 'Admin\InstitutionController');

            }
        );

    }
);

Route::post('/statistic/save', 'Site\StaticticController@save');

// OAuth Routes
Route::get('oauth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('oauth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
