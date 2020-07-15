<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    function allFood(){
    	$index = 1;
		$foods = Food::all();
		return view('foods.all-food',["foods"=>$foods,"index"=>$index]);
    }

    function postAddFood(Request $request) {
    	$newFood = new Food;
    	$newFood->food_name = $request->input('food_name');
    	$newFood->price = $request->input('price');
    	$newFood->quantity = $request->input('quantity');
        $newFood->created_at = date("Y-m-d h:i:sa");
        $newFood->updated_at = date("Y-m-d h:i:sa");
    	$newFood->save();
    	Session()->flash('message',"Food added successfully.");
    	return redirect('foods/all-food');
    }

    function getEditFood($id){
    	$food = Food::find($id);
    	return view('foods.edit-food',["food"=>$food]);
    }

    function postEditFood(Request $request) {
    	$Food = Food::find($request->input('id'));
    	$Food->food_name = $request->input('food_name');
    	$Food->price = $request->input('price');
    	$Food->quantity = $request->input('quantity');
        $Food->updated_at = date("Y-m-d h:i:sa");
    	$Food->save();
    	Session()->flash('message',"Food edit successfully.");
    	return redirect('foods/all-food');
    }

    function deleteFood($id){
    	$delete = Food::find($id)->delete();
    	if($delete){
    		Session()->flash('message',"Food Delete successfully.");
    		return redirect('foods/all-food');
    	}else{
    		return redirect('foods/all-food');
    	}
    }
}
