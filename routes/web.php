<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome2');
});


// resource uses everything in the contactUsController so you dont have to call each one.
Route::resource('contactus', 'App\Http\Controllers\contactUsController');


// the url is contactus and points to the view contactus. Name is used to reference for links (on the welcome page)
// {id} can be used in other places of the code/ like in the controller
// Route::get('/contactus', 'App\Http\Controllers\ContactUsController@render')->name('contact_us');


