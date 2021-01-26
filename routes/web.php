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
    return view('welcome');
});

Route::post('/upload', function(){

	    $imagePath = request('image')->store('defaultpic', 'public');
    	$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
    	$image->save();

//	request()->image->store('images', 'public');
	return "uploaded";
	//dd(request()->image);
});
Auth::routes();

Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home/{user}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');