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
Route::get('/event/search', 'HomeController@eventIndex')->name('event.index');
Route::get('/event/news', 'HomeController@news')->name('event.news');

//buyer
Route::get('/event/join/{id}', 'HomeController@joinEvent')->name('event.join');
Route::get('/events/myEvents', 'HomeController@buyerEvent')->name('event.buyer');

//webinfo
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@send')->name('contact.send');
Route::get('/about_us', 'ContactController@about')->name('contact.about');

Route::group(['middleware' => 'enterprise_able'], function () {
    Route::get('/enterprises/create', 'EnterpriseController@createEvent')->name('event.create');
    Route::post('/enterprises/event', 'EnterpriseController@postEvent')->name('event.store');
    Route::post('/enterprises', 'EnterpriseController@show')->name('enterprises.show');
    Route::get('/event/review/{event}', 'EnterpriseController@eventReview')->name('event.review');
    Route::get('/event/ticket/{qr}', 'EnterpriseController@checkQR')->name('event.checkQR');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => ['admin_able']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    //enterprise
    Route::resource('/enterprises', 'EnterpriseController');
    Route::get('/buyers', 'BuyerController@index')->name('buyers.index');
    //events
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/events/waiting', 'EventController@getWaiting')->name('events.waiting');
    Route::get('/events/validated', 'EventController@getValidated')->name('events.validated');
    Route::get('/events/detail/{id}', 'EventController@getDetail')->name('events.detail');
    Route::get('/events/success/{id}', 'EventController@setSuccess')->name('events.success');
    Route::get('/events/remove/{id}', 'EventController@removeEvent')->name('events.remove');
    Route::get('/coupons', 'CouponController@index')->name('coupons.index');


    //type, category
    Route::resource('/types', 'TypeController');
    Route::post('/types/restore', 'TypeController@restore')->name('types.restore');
    Route::resource('/categories', 'CategoryController');
    Route::post('/categories/restore', 'CategoryController@restore')->name('categories.restore');

    //chart
    Route::get('/charts/event', 'ChartController@chartEvent')->name('chart.event');
    Route::get('/charts/enterprise', 'ChartController@chartEvent')->name('chart.enterprise');
    Route::get('/charts/buyer', 'ChartController@chartEvent')->name('chart.buyer');
});
