<?php

Route::get('/', 'Frontend\MainController@showPage');
Route::get('/faq', 'Frontend\MainController@showPage');
Route::get('/whatwedo', 'Frontend\MainController@showPage');
Route::get('/history', 'Frontend\MainController@showPage');
Route::get('/contacts', 'Frontend\MainController@showPage');
Route::get('/lab', 'Frontend\MainController@showPage');

Route::get('portfolio/{type?}/{category?}', 'Frontend\PortfolioController@showPortfolioRUS');
Route::get('portfolio/{type}/{category}/{slug}', 'Frontend\PortfolioController@showWorkRUS');

Route::get('gallery/{type?}/{category?}', 'Frontend\PortfolioController@showGalleryRUS');
Route::get('gallery/{type}/{category}/{slug}', 'Frontend\PortfolioController@showWorkRUS');

/*Route::get('play/{slug}/{key?}', 'PlayController@play');
Route::post('play/{slug}/{key?}', 'PlayController@play');*/

Route::match(['get', 'post'], 'play/{slug}/{key?}', 'Frontend\PlayController@play');
Route::get('license/{domain}/{gallery_item_id}', 'Frontend\PlayController@createLicenseKey');

Route::post('message/subscribe', 'Frontend\MessageController@subscribe');
Route::post('message/contact', 'Frontend\MessageController@contact');
Route::post('message/start', 'Frontend\MessageController@start');
Route::post('message/requestcode', 'Frontend\MessageController@requestcode');