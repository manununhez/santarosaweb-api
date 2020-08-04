<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('inicio');
// });

// Route::get('/', "Views\InicioController@index");

Route::get('/', "Views\InicioController@index");

Route::get('/section/{section}', "Views\CategoriaController@index")->name('categoriasXseccion');

Route::get('/section/{section}/category/{category}', "Views\SubCategoriaController@index")->name('subCategoriasXcategoria');

Route::get('/section/{section}/category/{category}/item/{item}', "Views\ProductosController@index")->name('productosXsubCategoria');
