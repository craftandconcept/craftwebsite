<?php

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
    return redirect ('admin/categories');
});

Route::get('/admin', function () {
    return redirect ('admin/categories');
})->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::resources([
    '/admin/categories' => 'CategoryController',
    '/admin/projects' => 'ProjectsController',
    '/admin/creators' => 'CreatorController',
    '/admin/teams' => 'TeamController',
    '/admin/collaborators' => 'CollaboratorController',
    ]);
    Route::get('/admin/gallery', 'GalleryController@index');
    Route::get('/admin/gallery/create', 'GalleryController@create')->name('gallery.create');
    Route::get('/admin/gallery/remove', 'GalleryController@destroy')->name('gallery.delete');

    Route::post('/admin/gallery', 'GalleryController@index')->name('gallery.create');

    Route::post('/admin/gallery/save', 'GalleryController@store')->name('gallery.store');
});


