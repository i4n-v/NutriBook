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
                'energetic_value'=> $request->energetic_value
                // 'nutritionist_id' => Auth::user()->id
            ]);

            return redirect('foods?success=O alimento foi criado com sucesso!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return redirect("/foods?edit=$request->food");
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
        Food::findOrFail($request->id)->update($request->all());
        return redirect('foods?success=Alimento atualizado com sucesso!');
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
        return redirect('foods?success=Alimento deletado com sucesso!');
    }
}
