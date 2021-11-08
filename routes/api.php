<?php

use App\Http\Middleware\Cors;
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

// Allow Cors
Route::group(['middleware' => Cors::class], function () {
  

    //Product prefix
    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::post('', 'ProductController@createProduct');
        Route::get('', 'ProductController@getProducts');
    });

    //Category prefix
    Route::group(['prefix' => 'category', 'namespace' => 'Category'], function () {
        Route::get('', 'CategoryController@getCategories');
    });
});