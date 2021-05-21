<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Session;


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
Route::middleware(['checklogin'])->group(function () {
    //
    Route::resource('store',StoreController::class);
    Route::resource('ajax',AjaxController::class);

    Route::get('/main', function () {
        return view('front.home');
    });

    Route::get('/homeGrid', '\App\Http\Controllers\StoreController@Grid')->name('home');

    Route::get('/create/item', function () {
        Session::put('active','2');
        return view('front.core.additem');
    });

    Route::get('/edit/item/{id}', function ($id) {
        return redirect()->route('ajax.edit',$id);

    });

    Route::get('/delete/comment/{id}', '\App\Http\Controllers\AjaxController@delete');

});

Route::get('/', function () {
    return view('front.core.login');
});

Route::get('/login', function () {
    return view('front.core.login');
});
// Route::get('/logout',LoginController::class,'logout');
Route::get('logout', '\App\Http\Controllers\LoginController@logout');

Route::get('/register', function () {
    return view('front.core.register');
});



Route::resource('Login',LoginController::class);
Route::resource('store',StoreController::class)->middleware('checklogin');

// Route::any( '(.*)', function( $page ){
//     dd($page);
// });

