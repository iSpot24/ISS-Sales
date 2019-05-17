<?php

Route::get('product/{product}', 'ProductController@show')->name('product.show');

Route::get('/product', 'ProductController@create')->name('product.create');

Route::post('/product', 'ProductController@store')->name('product.store');

Route::patch('/product/{product}', 'ProductController@update')->name('product.update');

Route::delete('/product/{product}', 'ProductController@delete')->name('product.delete');