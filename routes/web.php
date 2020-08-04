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

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('categoria_automovil', function () {
    return view('categoria_automovil');
});

Route::get('talleres_sub_categoria', function () {
    return view('talleres_sub_categoria');
});

Route::get('talleres_interna', function () {
    return view('talleres_interna');
});
