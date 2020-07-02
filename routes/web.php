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

\Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace' => 'Frontend'], function () {

    //home
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/event/news', 'HomeController@news')->name('event.news');

    //user
    Route::get('/users', 'UserController@getInfo')->name('users.info');
    Route::get('/users/edit', 'UserController@edit')->name('users.edit');
    Route::post('/users', 'UserController@store')->name('users.post');


    //event
    Route::get('/event/detail/{event}', 'EventController@eventDetail')->name('event.detail');
    Route::get('/event/search', 'EventController@eventIndex')->name('event.index');
    Route::post('/event/comment', 'EventController@postComment')->name('event.postComment');

    //webinfo
    Route::get('/contact', 'ContactController@contact')->name('contact');
    Route::post('/contact', 'ContactController@send')->name('contact.send');
    Route::get('/about_us', 'ContactController@about')->name('contact.about');

    //buyer allow
    Route::group(['middleware' => 'buyer_able'], function () {
        Route::get('/event/join/{id}', 'EventController@joinEvent')->name('event.join');
        Route::get('/event/resend/{id}', 'EventController@resendTicket')->name('event.resend');
        Route::get('/events/myEvents', 'EventController@buyerEvent')->name('event.buyer');
    });

    //supplier allow
    Route::group(['middleware' => 'supplier_able'], function () {
        Route::get('/suppliers/create', 'EventController@createEvent')->name('event.create');
        Route::post('/suppliers/event', 'EventController@postEvent')->name('event.store');
        Route::get('/suppliers', 'EventController@supplierEvent')->name('event.supplier');
        Route::get('/event/review/{event}', 'EventController@eventReview')->name('event.review');
        Route::post('/event/delete', 'EventController@eventDelete')->name('event.delete');
        Route::get('/event/connect/{event}', 'EventController@connectEvent')->name('event.connect');
        Route::get('/event/ticket/{qr}', 'EventController@checkQR')->name('event.checkQR');
    });
});


Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => ['admin_able']], function () {
    //admin
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/create', 'AdminController@create')->name('admin.create');
    Route::get('/admin/detail/{id}', 'AdminController@show')->name('admin.show');
    Route::get('/admin/edit', 'AdminController@edit')->name('admin.edit');
    Route::put('/admin/update', 'AdminController@update')->name('admin.update');
    Route::post('/admin', 'AdminController@store')->name('admin.store');

    //supplier
    Route::resource('/suppliers', 'supplierController');
    Route::get('/suppliers/delete/{id}', 'supplierController@delete')->name('suppliers.delete');
    Route::get('/suppliers/restore/{id}', 'supplierController@restore')->name('suppliers.restore');

    //buyers
    Route::get('/buyers', 'BuyerController@index')->name('buyers.index');
    Route::get('/buyers/{id}', 'BuyerController@show')->name('buyers.show');
    Route::get('/buyers/delete/{id}', 'BuyerController@delete')->name('buyers.delete');
    Route::get('/buyers/restore/{id}', 'BuyerController@restore')->name('buyers.restore');

    //events
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/events/waiting', 'EventController@getWaiting')->name('events.waiting');
    Route::get('/events/validated', 'EventController@getValidated')->name('events.validated');
    Route::get('/events/delete', 'EventController@getDelete')->name('events.delete');
    Route::get('/events/detail/{id}', 'EventController@getDetail')->name('events.detail');
    Route::get('/events/success/{id}', 'EventController@setSuccess')->name('events.success');
    Route::post('/events/cancel', 'EventController@cancel')->name('events.cancel');
    Route::get('/coupons', 'CouponController@index')->name('coupons.index');


    //type, category
    Route::resource('/types', 'TypeController');
    Route::post('/types/restore', 'TypeController@restore')->name('types.restore');
    Route::resource('/categories', 'CategoryController');
    Route::post('/categories/restore', 'CategoryController@restore')->name('categories.restore');

    //chart
    Route::get('/charts/event', 'ChartController@chartEvent')->name('chart.event');
    Route::get('/charts/supplier', 'ChartController@chartEvent')->name('chart.supplier');
    Route::get('/charts/buyer', 'ChartController@chartEvent')->name('chart.buyer');
    Route::get('/calendar', 'ChartController@calendar')->name('chart.calendar');
});
