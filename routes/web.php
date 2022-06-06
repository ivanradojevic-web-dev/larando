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
	return redirect()->route('home', ['foo' => 'home']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/auth', function () {
    return response()->json([
        'auth' => auth()->check()
   	]);
});

require __DIR__.'/auth.php';

Route::get('/trinitti-rancco/{foo}', function () {
	return view('home');
})->where('foo', '.*')->name('home');
