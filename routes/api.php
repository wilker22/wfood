<?php

 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function(){

    Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
    Route::get('/tenants', 'Api\TenantApiController@index');

    Route::get('/categories/{url}', 'Api\CategoryApiController@show');
    Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'Api\TableApiController@show');
    Route::get('/tables', 'Api\TableApiController@tablesByTenant');

    Route::get('/products/{flag}', 'Api\ProductApiController@show');
    Route::get('/products', 'Api\ProductApiController@productsByTenant');

});

