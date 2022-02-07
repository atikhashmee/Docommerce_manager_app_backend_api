<?php

use Illuminate\Support\Facades\Route;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/test-drive', function () use ($router) {
    return 'hello world';
});

$router->get('/test', function () use ($router) {
    dd(1);
});

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'api'

], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::group(['prefix' => 'categories'], function ($router) {
        Route::get('/', 'CategoryController@index');
        Route::get('{id}', 'CategoryController@show');
        Route::post('store', 'CategoryController@store');
        Route::put('update/{id}', 'CategoryController@update');
        Route::delete('delete/{id}', 'CategoryController@destroy');
    });

    Route::group(['prefix' => 'warehouses'], function ($router) {
        Route::get('/', 'WarehouseController@index');
        Route::get('{id}', 'WarehouseController@show');
        Route::post('store', 'WarehouseController@store');
        Route::put('update/{id}', 'WarehouseController@update');
        Route::delete('delete/{id}', 'WarehouseController@destroy');
    });
    Route::group(['prefix' => 'countries'], function ($router) {
        Route::get('/', 'MainController@getCountries');
    });

    Route::group(['prefix' => 'brands'], function ($router) {
        Route::get('/', 'WarehouseController@index');
    });

    Route::group(['prefix' => 'manufectureres'], function ($router) {
        Route::get('/', 'ManufacturerController@index');
    });

    Route::group(['prefix' => 'suppliers'], function ($router) {
        Route::get('/', 'WarehouseController@index');
    });
});
