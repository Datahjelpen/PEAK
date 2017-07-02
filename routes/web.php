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

Auth::routes();

Route::prefix('admin')->group(function () {

	Route::get('/', 'Admin\Controller@index')->name('admin.dashboard');

	Route::prefix('builder')->group(function () {

		Route::resource('object_type', 'Admin\ObjectTypeController', ['except' => [ 'show' ]]);

		Route::prefix('{object_type}')->group(function () {
			// Route::resource('object_category', 'ObjectCategoryController', ['except' => [ 'show' ]]);
			// Route::resource('object_tag',      'ObjectTagController',      ['except' => [ 'show' ]]);
			// Route::resource('object',          'ObjectController',         ['except' => [ 'show' ]]);
		});

	});

	Route::get('oauth-dashboard', 'Admin\Controller@oauth')->name('oauth-dashboard');
});

Route::get('/', function () {
	return view('welcome', compact('types'));
})->name('frontpage');

Route::prefix('{object_type}')->group(function ($object_type) {
	// Route::resource('object_category', 'ObjectCategoryController', ['only' => [ 'index', 'show' ]]);
	// Route::resource('object_tag',      'ObjectTagController',      ['only' => [ 'index', 'show' ]]);
	// Route::resource('object',          'ObjectController',         ['only' => [ 'index', 'show' ]]);
});
