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
    public function edit(EatingPlan $eatingPlan)
    {
        return redirect()
        ->route('eating_plan', $eatingPlan->patient->user)
        ->with('success', 'Plano alimentar atualizado com sucesso!');
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
        $nutri_id = $meal->eatingPlan->nutritionist->user->id;
        if($nutri_id != auth()->user()->id){
            return response('', 403);
        }

        $meal->description = $request->desc;
        $meal->save();

        $food_carbo = $meal->foods()->where('type', 'carbo')->get()[0]->foodItem;
        $food_protein = $meal->foods()->where('type', 'protein')->get()[0]->foodItem;
        $food_fat = $meal->foods()->where('type', 'fat')->get()[0]->foodItem;

        $food_carbo->update([
            'weight' => $request->carboWeight,
            'food_id' => $request->carbo
        ]);

        $food_protein->update([
            'weight' => $request->proteinWeight,
            'food_id' => $request->protein
        ]);

        $food_fat->update([
            'weight' => $request->fatWeight,
            'food_id' => $request->fat
        ]);

        return $meal;
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

    public function loadMeals(EatingPlan $eatingPlan){
        $meals = $eatingPlan->meals()->get()->all();
        $response = [];

        foreach( $meals as $meal){

            $carbo = $meal->foods()->where('type', 'carbo')->get()[0]->foodItem ?? '';
            $protein = $meal->foods()->where('type', 'protein')->get()[0]->foodItem ?? '';
            $fat = $meal->foods()->where('type', 'fat')->get()[0]->foodItem ?? '';

            array_push($response, [
                'id' => $meal->id ?? '',
                'desc' => $meal->description ?? '',
                'carbo' => $carbo->food_id ?? '',
                'carboWeight' => $carbo->weight ?? '',
                'protein' => $protein->food_id ?? '',
                'proteinWeight' => $protein->weight ?? '',
                'fat' => $fat->food_id ?? '',
                'fatWeight' => $fat->weight ?? '',
            ]);
        }

        return $response;
    }
}

