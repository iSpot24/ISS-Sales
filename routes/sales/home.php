<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/{product}', 'HomeController@delete')->name('home.destroy');

Route::get('/search', 'HomeController@search')->name('home.search');