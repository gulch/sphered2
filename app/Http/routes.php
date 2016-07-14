<?php

Route::group(['middleware' => 'minifyHTML'], function () {
    Route::get('portfolio/{type?}/{category?}', 'Frontend\PortfolioController@showPortfolio');
    Route::get('portfolio/{type}/{category}/{slug}', 'Frontend\PortfolioController@showWork');

    Route::get('gallery/{type?}/{category?}', 'Frontend\PortfolioController@showGallery');
    Route::get('gallery/{type}/{category}/{slug}', 'Frontend\PortfolioController@showWork');

    Route::get('/{page_name?}', 'Frontend\MainController@showPage');

    Route::match(['get', 'post'], 'play/{slug}/{key?}', 'Frontend\PlayController@play');
});

Route::post('message/subscribe', 'Frontend\MessageController@subscribe');
Route::post('message/contact', 'Frontend\MessageController@contact');
Route::post('message/start', 'Frontend\MessageController@start');
Route::post('message/requestcode', 'Frontend\MessageController@requestcode');

Route::get('create/sitemap', 'SitemapController@generateSitemap');