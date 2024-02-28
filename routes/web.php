<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/index', [ClientController::class, 'index']);
    Route::get('/create-client', [ClientController::class, 'create']);
    Route::post('/save-client', [ClientController::class, 'store']);
    Route::get('/edit-client/{id}', [ClientController::class, 'edit']);
    Route::post('/update-client/{id}', [ClientController::class, 'update']);
    Route::delete('/delete/{id}', [ClientController::class, 'destroy']);

});
