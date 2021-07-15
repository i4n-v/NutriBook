<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\BodyMeasurementController;
use App\Http\Controllers\SkinFoldController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EatingPlanController;
use App\Http\Controllers\OrderingSelectorController;
use App\Http\Controllers\PatientController;


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

// profile routes
// Route::get('/profile', function(){
//     return view('profile');
// })->middleware(['auth'])->name('profile');

Route::post('/profile/patient/update', [PatientController::Class, 'update'])->middleware(['auth'])->name('update_patient_profile');

Route::post('/profile/patient/update/password', [PatientController::Class, 'edit'])->middleware(['auth'])->name('update_patient_password');

Route::get('/profile/{patient}', [PatientController::class, 'show'])->middleware(['auth'])->name('profile');

// food routes
Route::get('/foods', function () {

    if(Auth::user()->isNutritionist()){
        return view('foods');
    }else{
        return redirect()->route('login');
    }

})->middleware(['auth'])->name('foods');

Route::post('/foods/create', [FoodController::Class, 'store'])->middleware(['auth'])->name('create_food');

Route::get('/foods/remove/{food}', [FoodController::Class, 'destroy'])->middleware(['auth'])->name('food_delete');

Route::get('/foods/edit/redirect/{food}', [FoodController::Class, 'edit'])->middleware(['auth'])->name('food_redirect_edit');

Route::post('/foods/edit/{id}', [FoodController::Class, 'update'])->middleware(['auth'])->name('food_edit');

// evaluation routes
Route::get('/evaluation', function () {
    return view('evaluation');
})->middleware(['auth'])->name('evaluation');

Route::get('/evaluation', function () {  
    return view('evaluation');
})->middleware(['auth'])->name('evaluation');

Route::get('/evaluation/form', function () {
    $id = App\Models\Evaluation::find($_GET['evaluation'])->nutritionist->user->id;
    if(Auth::user()->id == $id){
        return view('components/create-evaluation');
    }else{
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('evaluation_form');

Route::get('/evaluation/view', function () {
    $id = App\Models\Evaluation::find($_GET['evaluation'])->nutritionist->user->id;
    $id2 = App\Models\Evaluation::find($_GET['evaluation'])->patient->user->id;   
    if(Auth::user()->id == $id || Auth::user()->id == $id2){
        return view('components/evaluation-view');
    }else{
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('evaluation_view');

Route::get('/evaluation/edit/anamnese/{id}', [AnamneseController::Class, 'edit'])->middleware(['auth'])->name('edit_anamnese');

Route::post('/evaluation/update/anamnese/{id}', [AnamneseController::Class, 'update'])->middleware(['auth'])->name('update_anamnese');

Route::get('/evaluation/edit/skinfold/{id}', [SkinFoldController::Class, 'edit'])->middleware(['auth'])->name('edit_skinfold');

Route::post('/evaluation/update/skinfold/{id}', [SkinFoldController::Class, 'update'])->middleware(['auth'])->name('update_skinfold');

Route::get('/evaluation/edit/bodymeasurement/{id}', [BodyMeasurementController::Class, 'edit'])->middleware(['auth'])->name('edit_bodymeasurement');

Route::post('/evaluation/update/bodymeasurement/{id}', [BodyMeasurementController::Class, 'update'])->middleware(['auth'])->name('update_bodymeasurement');

Route::get('/evaluation/create/{id}', [EvaluationController::Class, 'store'])->middleware(['auth'])->name('create_evaluation');

Route::get('/evaluation/delete/{evaluation}', [EvaluationController::Class, 'destroy'])->middleware(['auth'])->name('evaluation_delete');

Route::get('/evaluation/edit/{evaluation}', [EvaluationController::Class, 'edit'])->middleware(['auth'])->name('edit_evaluation');

Route::post('/evaluation/update/{id}', [EvaluationController::Class, 'update'])->middleware(['auth'])->name('update_evaluation');

// eating plan routes
Route::get('/eatingPlan/{id}', [EatingPlanController::Class, 'show'])->middleware(['auth'])->name('view_eating_plan');

Route::get('/home/eatingplan/remove/{eatingplan}', [EatingPlanController::Class, 'destroy'])->middleware(['auth'])->name('eatingplan_delete');

Route::get('home/ordering', [OrderingSelectorController::class, 'ordering'])
    ->middleware(['auth'])
    ->name('ordering');

require __DIR__.'/auth.php';
