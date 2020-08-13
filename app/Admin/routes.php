<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('products', ProductController::class);
    $router->resource('sections', SectionController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('category-item-categories', CategoryItemCategoryController::class);
    $router->resource('category-sections', CategorySectionController::class);
    $router->resource('item-categories', ItemCategoryController::class);
    $router->resource('item-category-products', ItemCategoryProductController::class);
    $router->resource('item-info-hours', ItemInfoHoursController::class);
    $router->resource('item-payment-types', ItemPaymentTypeController::class);
    $router->resource('payment-types', PaymentTypeController::class);
});
