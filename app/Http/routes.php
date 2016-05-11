<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/admin/register', 'reg\RegistrationController@register');
    Route::post('reg', 'reg\RegistrationController@postRegister');
    Route::get('/admin/login', 'login\LoginController@login');
    Route::post('/login', 'login\LoginController@postLogin');
    Route::get('/logout', 'login\LoginController@logout');

    Route::get('/', function () {
        return view('home.home');
    });

    Route::get('/project/maeprik', function () {
        return view('project.maeprik');
    });

    Route::get('/project/maeon', function () {
        return view('project.maeon');
    });
    Route::get('project/{project}/images/{date}', 'ImageGalleryController@show');
    Route::get('project/{project}/videos/{date}', 'VideoGalleryController@show');
});


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/admin/add-image', function () {
        return view('image.add-image');
    });

    Route::get('/admin/add-video', function () {
        return view('video.add-video');
    });

    Route::get('/admin', 'AdminDashboardController@index');

    Route::get('/admin/images', 'ImageGalleryController@index');
    Route::post('/admin/add-image', 'ImageGalleryController@store');
    Route::delete('/admin/delete-image/{id}', 'ImageGalleryController@destroy');

    Route::get('/admin/videos', 'VideoGalleryController@index');
    Route::get('/admin/edit-video/{id}', 'VideoGalleryController@edit');
    Route::put('/admin/edit-video/{id}', 'VideoGalleryController@update');
    Route::post('/admin/add-video', 'VideoGalleryController@store');
    Route::delete('/admin/delete-video/{id}', 'VideoGalleryController@destroy');
});