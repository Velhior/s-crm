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
    return view('welcome');
});
Route::get('contact', 'OrderController@getContact')->name('contact_get');
Route::post('contact', 'OrderController@postContact')->name('contact_post');
Route::get('blog','FrontblogController@index')->name('frontend_blog_index');
Route::get('blog/{slug}','FrontblogController@single')->name('frontend_blog_single');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin', function(){ return view('admin.index'); });

Route::prefix('manage')->middleware('auth')->group(function(){
    Route::get('/', 'ManageController@index')->name('manage.index');    
    Route::resource('settings','SettingsController')->except(['create','index','show', 'destroy']);
    Route::resource('bsettings', 'BsettingsController')->except(['create','index','show', 'destroy']);
    Route::resource('orders','OrderController');
    Route::resource('blogs','BlogController')->except(['show']);
    Route::resource('statuses','StatusController')->except(['show', 'edit']);
    Route::resource('faqs','FAQController')->except(['show']);
    Route::resource('faqscat','FAQCategoryController')->except(['show','edit']);
    Route::get('export', 'OrderimportController@export')->name('export');
    Route::get('import-orders', 'OrderimportController@importExportView')->name('import.orders');
    Route::post('import', 'OrderimportController@import')->name('import');
  });
  
  //Auth::routes();
  // Authentication Routes...
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  
  // Registration Routes...
  //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  //Route::post('register', 'Auth\RegisterController@register');
  
  // Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');