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

// Route::get('/', function () {
//     return view('showall');
// });

Route::get('/users', function () {
	$users=DB::table('details')->get();

    return view('showall',compact('users'));
});
Route::get('/results/{str}', 'DocumentsController@show');
Route::get('/', function(){
	return view('search');
});

Route::get('/test', function(){
	return view('testview');
});




