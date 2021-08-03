<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\BodyMeasurementController;
use App\Http\Controllers\SkinFoldController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EatingPlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MealController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return redirect('/login');
});

// Route::middleware([])


Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

//profile routes

Route::get('/profile/{user}', [UserController::class, 'show'])->middleware(['auth'])->name('profile');

Route::post('/profile/update/{user}', [UserController::Class, 'update'])->middleware(['auth'])->name('update_profile');

Route::post('/profile/update/password/{user}', [UserController::Class, 'edit'])->middleware(['auth'])->name('update_password');

// food routes
Route::get('/foods', [FoodController::Class, 'show'])->middleware(['auth'])->name('foods');

Route::post('/foods/create', [FoodController::Class, 'store'])->middleware(['auth'])->name('create_food');

Route::get('/foods/remove/{food}', [FoodController::Class, 'destroy'])->middleware(['auth'])->name('food_delete');

Route::get('/foods/edit/{food}', [FoodController::Class, 'edit'])->middleware(['auth'])->name('food_edit');

Route::post('/foods/update/{food}', [FoodController::Class, 'update'])->middleware(['auth'])->name('food_update');

// evaluation routes
Route::get('/evaluation/{patient}', [EvaluationController::Class, 'index'])->middleware(['auth'])->name('evaluation');

Route::get('/evaluation/view/{evaluation}', [Evaluationcontroller::Class, 'show'])->middleware(['auth'])->name('evaluation_view');

Route::get('/evaluation/create/{patient}', [EvaluationController::Class, 'store'])->middleware(['auth'])->name('create_evaluation');

Route::get('/evaluation/delete/{evaluation}', [EvaluationController::Class, 'destroy'])->middleware(['auth'])->name('evaluation_delete');

Route::get('/evaluation/edit/{evaluation}', [EvaluationController::Class, 'edit'])->middleware(['auth'])->name('edit_evaluation');

Route::post('/evaluation/update/{evaluation}', [EvaluationController::Class, 'update'])->middleware(['auth'])->name('update_evaluation');

Route::get('/evaluation/edit/anamnese/{id}', [AnamneseController::Class, 'edit'])->middleware(['auth'])->name('edit_anamnese');

Route::post('/evaluation/update/anamnese/{anamnese}', [AnamneseController::Class, 'update'])->middleware(['auth'])->name('update_anamnese');

Route::get('/evaluation/edit/skinfold/{id}', [SkinFoldController::Class, 'edit'])->middleware(['auth'])->name('edit_skinfold');

Route::post('/evaluation/update/skinfold/{skinFold}', [SkinFoldController::Class, 'update'])->middleware(['auth'])->name('update_skinfold');

Route::get('/evaluation/edit/bodymeasurement/{id}', [BodyMeasurementController::Class, 'edit'])->middleware(['auth'])->name('edit_bodymeasurement');

Route::post('/evaluation/update/bodymeasurement/{bodyMeasurement}', [BodyMeasurementController::Class, 'update'])->middleware(['auth'])->name('update_bodymeasurement');

// eating plan routes
Route::get('/eatingPlan/{user}', [EatingPlanController::Class, 'show'])->middleware(['auth'])->name('eating_plan');

Route::get('/home/eatingplan/view/{eatingPlan}', [EatingPlanController::Class, 'view'])->middleware(['auth'])->name('eating_plan_view');

Route::get('/home/eatingplan/remove/{eatingplan}', [EatingPlanController::Class, 'destroy'])->middleware(['auth'])->name('eatingplan_delete');

Route::get('/home/eatingplan/forms/create/{patient}', [EatingPlanController::Class, 'index'])->middleware(['auth'])->name('action_eatingplan_create');

Route::get('/home/eatingplan/forms/edit/{eatingPlan}', [EatingPlanController::Class, 'edit'])->middleware(['auth'])->name('action_eatingplan_edit');

Route::post('/home/eatingplan/create/{patient}', [EatingPlanController::Class, 'store'])->middleware(['auth'])->name('eatingplan_create');

Route::post('/home/eatingplan/create/meal/{eatingPlan}', [MealController::Class, 'store'])->middleware(['auth'])->name('meal_create');

Route::post('/home/eatingplan/update/meal/{meal}', [MealController::Class, 'update'])->middleware(['auth'])->name('meal_update');

Route::post('/home/eatingplan/meal/delete/{meal}', [MealController::Class, 'destroy'])->middleware(['auth'])->name('meal_delete');

Route::get('/loadMeals/{eatingPlan}', [MealController::class, 'loadMeals'])->middleware(['auth']);

Route::get('/eatingplan/created/{eatingPlan}', [MealController::class, 'index'])->middleware(['auth'])->name('created_eatingplan');

Route::get('/eatingplan/saved/{eatingPlan}', [MealController::class, 'edit'])->middleware(['auth'])->name('saved_eatingplan');

Route::get('/nutri-patients', [PatientController::class, 'nutriPatients'])->middleware(['auth']);

Route::get('/eating-plans/{user?}', [EatingPlanController::class, 'eatingPlansData'])->middleware(['auth']);

Route::get('/search', function () {
    return view('search');
})->middleware(['auth'])->name('search');

require __DIR__.'/auth.php';
// Route::get('/mailable', function () {
//     $user = App\Models\User::find(1);

//     return (new Illuminate\Auth\Notifications\VerifyEmail())->toMail($user);
// });