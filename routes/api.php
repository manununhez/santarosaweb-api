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
Route::post('sections','SectionsController@store');
Route::put('sections/{section}','SectionsController@update');
Route::delete('sections/{section}', 'SectionsController@delete');

Route::get('sections/{section}/categories', 'SectionCategoriesController@show');
Route::post('sections/{section}/categories', 'SectionCategoriesController@store');

Route::get('categories', 'CategoriesController@index');
Route::get('categories/{category}', 'CategoriesController@show');
Route::post('categories','CategoriesController@store');
Route::put('categories/{category}','CategoriesController@update');
Route::delete('categories/{category}', 'CategoriesController@delete');

Route::get('categories/{category}/items', 'CategoryItemsCategoryController@show');
Route::post('categories/{category}/items', 'CategoryItemsCategoryController@store');

Route::get('items', 'ItemsCategoryController@index');
Route::get('items/{item}', 'ItemsCategoryController@show');
Route::post('items','ItemsCategoryController@store');
Route::put('items/{item}','ItemsCategoryController@update');
Route::delete('items/{item}', 'ItemsCategoryController@delete');

Route::get('items/{item}/products', 'ItemCategoryProductsController@show');
Route::post('items/{item}/products', 'ItemCategoryProductsController@store');

Route::get('products', 'ProductsController@index');
Route::get('products/{product}', 'ProductsController@show');
Route::post('products','ProductsController@store');
Route::put('products/{product}','ProductsController@update');
Route::delete('products/{product}', 'ProductsController@delete');

Route::get('search', function (Request $request) {
    $searchTerm = $request->q;
    
    $sections = App\Section::query()
                ->select('section_id', 'name', 'image_url')
                ->where('name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('description', 'LIKE', "%{$searchTerm}%") 
                ->get();

    $categories = App\Category::query()
                ->select('category_id', 'name', 'image_url')
                ->where('name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('description', 'LIKE', "%{$searchTerm}%") 
                ->get();
    
    $items = App\ItemCategory::query()
                ->select('item_category_id', 'name', 'image_url')
                ->where('name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('description', 'LIKE', "%{$searchTerm}%") 
                ->get();

    $products = App\Product::query()
                ->select('product_id', 'name', 'price', 'image_url')
                ->where('name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('description', 'LIKE', "%{$searchTerm}%") 
                ->get();

    $result = [
        'products' => $products,
        'categories' => $categories,
        'sections' => $sections,
        'items' => $items,
    ];

    $response = [
        'success' => true,
        'data'    => $result,
        'message' => "Search completed.",
    ];

    return response()->json($response, 200);
});
