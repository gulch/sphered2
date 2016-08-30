<?php

// Генерация файла sitemap.xml
Route::get('create/sitemap', 'SitemapController@generateSitemap');

/* Генерация RSS */
Route::get('feed', 'RssController@generate');
Route::get('rss', 'RssController@generate');

Route::group(['middleware' => ['admin']], function () {

    Route::group(['middleware' => 'VerifyCsrfToken'], function () {
        /* Auth routes */
        Route::get('login', 'Auth\AuthController@showLoginForm');
        Route::post('login', 'Auth\AuthController@login');
        Route::get('logout', 'Auth\AuthController@logout');
        Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Auth\PasswordController@reset');
        Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    });

    /* Backend routes */
    Route::group(['prefix' => config('app.admin_segment_name'), 'middleware' => 'auth'], function () {
        Route::get('/', 'Backend\DashboardController@index');
        /* Статьи в блоге */
        Route::resource('tags', 'Backend\TagsController');
        Route::post('tags/{id}/publish', 'Backend\TagsController@publish');
        Route::post('tags/{id}/unpublish', 'Backend\TagsController@unpublish');

        /* Изображения */
        Route::post('image/upload', 'Backend\ImagesController@upload');
    });

});

// Сообщения с форм
Route::group(['prefix' => 'message'], function () {
    Route::post('subscribe', 'Frontend\MessageController@subscribe');
    Route::post('contact', 'Frontend\MessageController@contact');
    Route::post('start', 'Frontend\MessageController@start');
    Route::post('requestcode', 'Frontend\MessageController@requestcode');
});

// Frontend
Route::group(['middleware' => 'MinifyHTML'], function () {

    Route::get('blog', 'Frontend\BlogController@index');
    Route::get('blog/{slug}', 'Frontend\BlogController@show');

    Route::get('blog/tag/{slug}', 'Frontend\BlogController@indexByTag');

    Route::get('portfolio/{type?}/{category?}', 'Frontend\PortfolioController@showPortfolio');
    Route::get('portfolio/{type}/{category}/{slug}', 'Frontend\PortfolioController@showWork');

    Route::get('gallery/{type?}/{category?}', 'Frontend\PortfolioController@showGallery');
    Route::get('gallery/{type}/{category}/{slug}', 'Frontend\PortfolioController@showWork');

    Route::match(['get', 'post'], 'play/{slug}/{key?}', 'Frontend\PlayController@play');

    Route::get('/{page_name?}', 'Frontend\MainController@showPage');
});