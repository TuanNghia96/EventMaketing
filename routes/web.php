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
    Route::get('/event/join/{id}', 'EventController@joinEvent')->name('event.join');
    Route::get('/event/resend/{id}', 'EventController@resendTicket')->name('event.resend');
    Route::get('/events/myEvents', 'EventController@buyerEvent')->name('event.buyer');
    Route::post('/event/comment', 'EventController@postComment')->name('event.postComment');

    //webinfo
    Route::get('/contact', 'ContactController@contact')->name('contact');
    Route::post('/contact', 'ContactController@send')->name('contact.send');
    Route::get('/about_us', 'ContactController@about')->name('contact.about');

    Route::group(['middleware' => 'enterprise_able'], function () {
        Route::get('/enterprises/create', 'EventController@createEvent')->name('event.create');
        Route::post('/enterprises/event', 'EventController@postEvent')->name('event.store');
        Route::get('/enterprises', 'EventController@enterpriseEvent')->name('event.enterprise');
        Route::get('/event/review/{event}', 'EventController@eventReview')->name('event.review');
        Route::get('/event/connect/{event}', 'EventController@connectEvent')->name('event.connect');
        Route::get('/event/ticket/{qr}', 'EventController@checkQR')->name('event.checkQR');
    });
});


Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => ['admin_able']], function () {
    //admin
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/create', 'AdminController@create')->name('admin.create');
    Route::post('/admin', 'AdminController@store')->name('admin.store');

    //enterprise
    Route::resource('/enterprises', 'EnterpriseController');
    Route::get('/enterprises/delete/{id}', 'EnterpriseController@delete')->name('enterprises.delete');
    Route::get('/enterprises/restore/{id}', 'EnterpriseController@restore')->name('enterprises.restore');

    //buyers
    Route::get('/buyers', 'BuyerController@index')->name('buyers.index');
    Route::get('/buyers/{id}', 'BuyerController@show')->name('buyers.show');
    Route::get('/buyers/delete/{id}', 'BuyerController@delete')->name('buyers.delete');
    Route::get('/buyers/restore/{id}', 'BuyerController@restore')->name('buyers.restore');

    //events
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/events/waiting', 'EventController@getWaiting')->name('events.waiting');
    Route::get('/events/validated', 'EventController@getValidated')->name('events.validated');
    Route::get('/events/detail/{id}', 'EventController@getDetail')->name('events.detail');
    Route::get('/events/success/{id}', 'EventController@setSuccess')->name('events.success');
    Route::get('/events/cancel/{id}', 'EventController@cancel')->name('events.cancel');
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
    Route::get('/calendar', 'ChartController@calendar')->name('chart.calendar');
});
