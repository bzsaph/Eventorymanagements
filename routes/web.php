<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/about-us','Newhomecontroler@aboutus');


Route::group(['middleware'=> ['auth','admin']], function () {
Route::get('/dashboard','AdminController@dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Orderciment','AdminController@Orderciment');
Route::get('/Edituser','AdminController@Edituser');
Route::get('/Edituser/{id}','AdminController@Edituserbyid');
Route::post('/ChangeStutas','AdminController@ChangeStutas');
Route::post('/Ordercimentsubmit','AdminController@Ordercimentsubmit');
Route::get('/Newstocker','AdminController@Newstocker');
Route::post('/newStockercrete','AdminController@newStockercrete');
Route::get('/delete/{id}', 'AdminController@deletedepo');
Route::get('/ACCEPTCIMENT','AdminController@ACCEPTCIMENT');
Route::get('/acceptciment/{id}','AdminController@acceptcimentbyid');
Route::get('/soldeout','AdminController@soldeout');
Route::post('/sellcimenttocustomer','AdminController@sellcimenttocustomer');
Route::get('/Cimententsold','AdminController@Cimententsold');
        // view()->composer(['*'], function($view) { $ProvinceRegion=Province::all();
        //  $view->with(compact('ProvinceRegion'));});

// admin controller
    // Route::get('/about-us','Newhomecontroler@aboutus');
    // Route::get('/Groups','Admincontroller@Group');
    // Route::post('/registerGroups','Admincontroller@registerGroups');

    // Route::get('/members','Admincontroller@members');
    // Route::get('/members/{id}','Admincontroller@membersavings');
    // Route::post('/Savingprocess','Admincontroller@Savingprocess');
    // Route::get('/profite','Admincontroller@profite');
    // Route::get('/Saving','Admincontroller@Saving');
    // Route::post('/Loan','Admincontroller@Loan');


// UseHomecontroller
Route::get('/Useprofile', 'UserHomecontroller@Useprofile');


});
