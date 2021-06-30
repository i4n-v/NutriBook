<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

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
    return redirect('/login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/foods', function () {
    return view('foods');
})->middleware(['auth'])->name('foods');

Route::post('/food/create', [FoodController::Class, 'store'])->middleware(['auth'])->name('create_food');

Route::get('/food/remove/{food}', [FoodController::Class, 'destroy'])->middleware(['auth'])->name('remove_food');

require __DIR__.'/auth.php';
