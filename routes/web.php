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

    if(Auth::user()->isNutritionist()){
        return view('foods');
    }else{
        return redirect('/login');
    }

})->middleware(['auth'])->name('foods');

Route::post('/foods/create', [FoodController::Class, 'store'])->middleware(['auth'])->name('create_food');

Route::get('/foods/remove/{food}', [FoodController::Class, 'destroy'])->middleware(['auth'])->name('food_delete');

Route::get('/foods/edit/redirect/{food}', [FoodController::Class, 'edit'])->middleware(['auth'])->name('food_redirect_edit');

Route::post('/foods/edit/{id}', [FoodController::Class, 'update'])->middleware(['auth'])->name('food_edit');

require __DIR__.'/auth.php';
