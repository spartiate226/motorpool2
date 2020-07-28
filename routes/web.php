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
    return view('auth.login');
});

Auth::routes();

Route::get('regist/{page?}/{update?}','Auth\sign_in@form');
Route::post('sign','Auth\sign_in@create');
Route::post('update','Auth\sign_in@update');
Route::get('user/delete/{id}','Auth\sign_in@delete');
Route::get('userlist','Auth\sign_in@index');
Route::post('userlist','Auth\sign_in@index');
Route::get('dispatcher_dashboad', function (){
    return view('dispatcher.dashboard');
});

Route::get('new_request', 'DashboardController@form');
Route::post('new_request', 'DashboardController@add');
Route::get('request_list/{userid}', 'DashboardController@ListRequests');

Route::get('dispatcher_dashboad/ongoin', 'RequestController@ongoinIndex');
Route::get('history/{page}', 'RequestController@history');
Route::get('Manage/{trip_request}', 'RequestController@create');
Route::post('Manage/update', 'RequestController@update');
Route::post('Manage/reupdate', 'RequestController@reupdate');

Route::post('cars/add/{id?}', 'CarsController@store');
Route::get('cars/add/{id?}', 'CarsController@create');
Route::get('cars/update', 'CarsController@update');
Route::get('cars/list', 'CarsController@index');
Route::get('cars/delete/{id}', 'CarsController@delete');
Route::post('cars/list', 'CarsController@index');
Route::get('print/{id}', 'RepportController@print');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('passenger_dashboard', 'DashboardController@index');
Route::get('requestForm', 'DashboardController@form');
Route::get('requestList', 'DashboardController@list');



Route::get('repport', 'RepportController@create');
Route::post('repport/update', 'RepportController@store');


Route::get('DriverRequest/{id}', 'DriverController@index');
Route::get('DriverPending/{id}', 'DriverController@history');
