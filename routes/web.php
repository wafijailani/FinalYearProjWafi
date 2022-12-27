<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control;
use App\Http\Controllers\adminControl;


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

Route::get('/redirect',[Control::class,"redirectFunct"]);

Route::get('/viewnews', [Control::class, 'viewNews']);

Route::get('/viewmap', [Control::class, 'viewMap']);

Route::get('/postupdates', [Control::class, 'postUpdates']);

Route::post('/storeupdates',[Control::class, 'storeUpdates']);

Route::get('/viewupdates', [Control::class, 'viewUpdates']);

Route::get('/viewownupdates', [Control::class, 'viewOwnUpdates']);

Route::get('/edit/{id}',[Control::class,'editUpdates']);

Route::put('/editandupdate/{id}', [Control::class, 'Update']);

Route::get('/emergency', [Control::class, 'emergencyContact']);

Route::get('/guide', [Control::class, 'guideList']);

Route::controller(Control::class)->group(function(){
    Route::get('/image-upload', 'index1')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/viewusers', [adminControl::class, 'viewUsers']);

Route::get('/deleteuser/{id}',[adminControl::class,'destroy']);

