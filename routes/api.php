<?php

use Illuminate\Http\Request;
use App\Http\Resources\User;
use App\UserCaro;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/user/{id}', 'MyController@manh');
Route::get('/user', 'MyController@manh1');
Route::get('/room', 'MyController@room');
Route::get('/thongke/{id}', 'MyController@thongke');
Route::get('/thongke', 'MyController@thongke1');
Route::get('/reset', 'MyController@reset');
Route::post('/login', 'MyController@login');
Route::post('/signup', 'MyController@signup');
Route::post('/search', 'MyController@search');
Route::post('/logout', 'MyController@logout');
Route::post('/friendrequest', 'MyController@friendrequest');
Route::get('/friendlist/{id}', 'MyController@friendlist');
Route::post('/win', 'MyController@win');
Route::post('/draw', 'MyController@draw');
Route::post('/lose', 'MyController@lose');