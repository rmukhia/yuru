<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

/*
 *	The guest view
 */

Route::get('/', 'YuruController@home')->name('yuru.home');
Route::get('/page/{page}', 'YuruController@getPage')->name('yuru.page');
Route::get('/images/{page}', 'YuruController@getImages')->name('yuru.images');

Route::get('/contact', 'YuruController@getContact')->name('yuru.contact');

/*
 * The Admin View
 */

Route::get('/admin/page/test/{page}', 'AdminController@getPage')->name('yuru.admin.page');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/admin/page/{page}', 'AdminController@getPage')->name('yuru.admin.page');

	Route::patch('/admin/savePage/{page}', 'AdminController@patchsavePage')->name('yuru.admin.savePage');
	Route::post('/admin/uploadMedia/{page}', 'AdminController@postUploadMedia')->name('yuru.admin.uploadMedia');

	Route::get('/admin/deleteMedia/{media}', 'AdminController@getDeleteMedia')->name('yuru.admin.deleteMedia');
	Route::delete('/admin/deleteMedia/{media}', 'AdminController@deleteDeleteMedia')->name('yuru.admin.deleteMedia.delete');

	Route::get('/admin/debug/{command}', 'AdminController@getDebug')->name('yuru.admin.debug');
});