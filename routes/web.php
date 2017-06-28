<?php

Route::feeds();

Route::get('/', 'HomeController')->name('home');
Route::get('/about', 'AboutController');
Route::get('/open-source', 'OpenSourceController');
Route::get('/analytics', 'AnalyticsController');
Route::get('/{slug}', 'ArticleController')->where('slug', '(.*)');
