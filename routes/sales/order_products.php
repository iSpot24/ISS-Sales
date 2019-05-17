<?php

Route::post('/order/product/{product}', 'OrderProductsController@store')->name('order.products.store');

Route::get('/order/product/{product}', 'OrderProductsController@create')->name('order.products.create');