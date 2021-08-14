<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {

        $uniqueFood = Food::where('food', $request->food)->get();

        if (sizeof($uniqueFood)>0) {
            return redirect('foods?error=O Alimento já existe no sistema!');
        }else if($request->carbohydrate > $request->protein && $request->carbohydrate > $request->total_fat){
            $food = Food::create([
                'weight'=> $request->weight,
                'food'=> $request->food,
                'sodium'=> $request->sodium,
                'dietary_fiber'=> $request->fiber,
                'trans_fat'=> $request->trans_fat,
                'saturated_fat'=> $request->saturated_fat,
                'total_fat'=> $request->total_fat,
                'protein'=> $request->protein,
                'carbohydrate'=> $request->carbohydrate,
                'energetic_value'=> $request->energetic_value,
                'type' => 'carbo'
                // 'nutritionist_id' => Auth::user()->id
            ]);

            $food->update($request->all());
            return redirect()
            ->route('foods')
            ->with('success', 'Alimento criado com sucesso!');
        }else if($request->protein > $request->total_fat && $request->protein > $request->carbohydrate){
            $food = Food::create([
                'weight'=> $request->weight,
                'food'=> $request->food,
                'sodium'=> $request->sodium,
                'dietary_fiber'=> $request->fiber,
                'trans_fat'=> $request->trans_fat,
                'saturated_fat'=> $request->saturated_fat,
                'total_fat'=> $request->total_fat,
                'protein'=> $request->protein,
                'carbohydrate'=> $request->carbohydrate,
                'energetic_value'=> $request->energetic_value,
                // 'nutritionist_id' => Auth::user()->id
                'type' => 'protein'
            ]);

            $food->update($request->all());
            return redirect()
            ->route('foods')
            ->with('success', 'Alimento criado com sucesso!');
        }else{
            $food = Food::create([
                'weight'=> $request->weight,
                'food'=> $request->food,
                'sodium'=> $request->sodium,
                'dietary_fiber'=> $request->fiber,
                'trans_fat'=> $request->trans_fat,
                'saturated_fat'=> $request->saturated_fat,
                'total_fat'=> $request->total_fat,
                'protein'=> $request->protein,
                'carbohydrate'=> $request->carbohydrate,
                'energetic_value'=> $request->energetic_value,
                'type' => 'fat'
                // 'nutritionist_id' => Auth::user()->id
            ]);

            $food->update($request->all());
            return redirect()
            ->route('foods')
            ->with('success', 'Alimento criado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        if(auth()->user()->isNutritionist()){
            return view('foods');
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('components/food-edit', ['food' => $food]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $food->update($request->all());

        return redirect()
        ->route('foods')
        ->with('success', 'Dados do alimento atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()
        ->route('foods')
        ->with('success', 'Alimento excluido com sucesso!');
    }
}
