<?php

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin.dashboard');
$router->map('POST', '/admin', 'App\Controllers\Admin\DashboardController@get', 'admin_form');

$router->map('GET', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
$router->map('POST', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@store', 'create_product_category');
