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

/*Route::get('/', function () {
    return view('welcome');
});*/



//Restful
Route::resource('/users', 'UsersController')->middleware('auth');

\Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/event/detail/{event}', 'HomeController@eventDetail')->name('event.detail');
Route::get('/sub_event', 'HomeController@getSubEvent')->name('event.sub');
Route::get('/events', 'HomeController@eventIndex')->name('event.index');
Route::get('/event/search', 'HomeController@eventSearch')->name('event.search');
Route::get('/event/create', 'EnterpriseController@createEvent')->name('event.create');
Route::post('/event', 'EnterpriseController@postEvent')->name('event.store');
Route::resource('abc', 'HomeController');
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@send')->name('contact.send');
Route::get('/about_us', 'ContactController@about')->name('contact.about');

Route::get('/home/download', 'HomeController@download')->name('home.download');
Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => ['admin_able']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/enterprises', 'EnterpriseController@index')->name('enterprises.index');
    Route::get('/buyers', 'BuyerController@index')->name('buyers.index');
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/vouchers', 'VoucherController@index')->name('vouchers.index');
});
