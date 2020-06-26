<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('sections', 'SectionsController@index');
Route::get('sections/{section}', 'SectionsController@show');
Route::get('sections/{section}/categories', 'SectionsController@showCategories');
Route::post('sections','SectionsController@store');
Route::put('sections/{section}','SectionsController@update');
Route::delete('sections/{section}', 'SectionsController@delete');

Route::get('categories', 'CategoriesController@index');
Route::get('categories/{category}', 'CategoriesController@show');
Route::get('categories/{category}/items', 'CategoriesController@showItems');
Route::post('categories','CategoriesController@store');
Route::put('categories/{category}','CategoriesController@update');
Route::delete('categories/{category}', 'CategoriesController@delete');

Route::get('items', 'ItemsCategoryController@index');
Route::get('items/{item}', 'ItemsCategoryController@show');
Route::get('items/{item}/products', 'ItemsCategoryController@showProducts');
Route::post('items','ItemsCategoryController@store');
Route::put('items/{item}','ItemsCategoryController@update');
Route::delete('items/{item}', 'ItemsCategoryController@delete');

Route::get('products', 'ProductsController@index');
Route::get('products/{product}', 'ProductsController@show');
Route::post('products','ProductsController@store');
Route::put('products/{product}','ProductsController@update');
Route::delete('products/{product}', 'ProductsController@delete');
