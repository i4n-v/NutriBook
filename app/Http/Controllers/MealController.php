<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\EatingPlan;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EatingPlan $eatingPlan)
    {
        return redirect()
        ->route('eating_plan', $eatingPlan->patient->user)
        ->with('success', 'Plano alimentar criado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EatingPlan $eatingPlan)
    {
        $meal = Meal::create([
            'description' => $request->desc,
            'nutritionist_id' => auth()->user()->nutritionistProfile->id,
            'eating_plan_id' => $eatingPlan->id,
        ]);

        $food_carbo = FoodItem::create([
            'weight' => $request->carboWeight,
            'meal_id' => $meal->id,
            'food_id' => $request->carbo,
        ]);

        $food_protein = FoodItem::create([
            'weight' => $request->proteinWeight,
            'meal_id' => $meal->id,
            'food_id' => $request->protein,
        ]);

        $food_fat = FoodItem::create([
            'weight' => $request->fatWeight,
            'meal_id' => $meal->id,
            'food_id' => $request->fat,
        ]);

        return $meal;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
