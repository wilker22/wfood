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

Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
Route::get('/tenants', 'Api\TenantApiController@index');

Route::get('/categories/{url}', 'Api\CategoryApiController@show');
Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

Route::get('/tables/{identify}', 'Api\TableApiController@show');
Route::get('/tables', 'Api\TableApiController@tablesByTenant');

<<<<<<< HEAD
Route::get('/products', 'Api\ProductApiController@productsByTenant');

=======
>>>>>>> dad99c20418a46e5341affe3d2806e68109005c6

