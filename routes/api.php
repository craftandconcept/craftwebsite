<?php

use Illuminate\Http\Request;

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

Route::get('/v1', 'ProjectApiController@index');
Route::get('/v1/{project}', 'ProjectApiController@getProject');

Route::get('/categories', 'CategoriesApiController@index');
Route::get('/categories/{id}', 'CategoriesApiController@show');

Route::get('/teams', 'TeamsApiController@index');
Route::get('/teams/{id}', 'TeamsApiController@show');

Route::get('/creators', 'CreatorsApiController@index');
Route::get('/creators/{id}', 'CreatorsApiController@show');

Route::get('/collaborators', 'CollaboratorsApiController@index');
Route::get('/collaborators/{id}', 'CollaboratorsApiController@show');

Route::get('/gallery', 'GalleryController@getGallery');

Route::post('/v1', 'ProjectApiController@projectfilter');
