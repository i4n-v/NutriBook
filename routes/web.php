<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\BodyMeasurementController;
use App\Http\Controllers\SkinFoldController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EatingPlanController;


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

// food routes
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

// evaluation routes
Route::get('/evaluation', function () {

    if(Auth::user()->isNutritionist()){
        return view('evaluation');
    }else{
        return redirect('/login');
    }
})->middleware(['auth'])->name('evaluation');

Route::post('/evaluation/create/anamnese', [AnamneseController::Class, 'store'])->middleware(['auth'])->name('create_anamnese');

Route::get('/evaluation/edit/anamnese/{id}', [AnamneseController::Class, 'edit'])->middleware(['auth'])->name('edit_anamnese');

Route::post('/evaluation/update/anamnese/{id}', [AnamneseController::Class, 'update'])->middleware(['auth'])->name('update_anamnese');

Route::post('/evaluation/create/skinfold', [SkinFoldController::Class, 'store'])->middleware(['auth'])->name('create_skinfold');

Route::get('/evaluation/edit/skinfold/{id}', [SkinFoldController::Class, 'edit'])->middleware(['auth'])->name('edit_skinfold');

Route::post('/evaluation/update/skinfold/{id}', [SkinFoldController::Class, 'update'])->middleware(['auth'])->name('update_skinfold');

Route::post('/evaluation/create/bodymeasurement', [BodyMeasurementController::Class, 'store'])->middleware(['auth'])->name('create_bodymeasurement');

Route::get('/evaluation/edit/bodymeasurement/{id}', [BodyMeasurementController::Class, 'edit'])->middleware(['auth'])->name('edit_bodymeasurement');

Route::post('/evaluation/update/bodymeasurement/{id}', [BodyMeasurementController::Class, 'update'])->middleware(['auth'])->name('update_bodymeasurement');

Route::post('/evaluation/create/evaluation', [EvaluationController::Class, 'store'])->middleware(['auth'])->name('create_evaluation');

Route::get('/evaluation/edit/evaluation/{id}', [EvaluationController::Class, 'edit'])->middleware(['auth'])->name('edit_evaluation');

Route::post('/evaluation/update/evaluation/{id}', [EvaluationController::Class, 'update'])->middleware(['auth'])->name('update_evaluation');

// eating plan routes
Route::get('/eatingPlan/{id}', [EatingPlanController::Class, 'show'])->middleware(['auth'])->name('view_eating_plan');

require __DIR__.'/auth.php';