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




//Route::get('about', function () {
    //return view('pages.about'); //look in resources/views for a file called about.blade.php
//});


Route::get('cards', 'CardsController@index');
