<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;

class BasketController extends Controller
{
    public function listBasket(){
        return response()->json(Basket::all(), 200);
    }

    public function getBasket($id){
        $carrier = Basket::find($id);
        if(is_null($basket))
            return response()->json(['message'=>'basket Not Found'], 404);
        else
            return response()->json($basket, 200);
    }

    public function addBasket(Request $request){
        $basket = Basket::create($request->all());
        return response()->json($basket, 200);
    }

    public function updateBasket(Request $request, $id){
        $basket = Basket::find($id);
        if(is_null($basket))
            return response()->json(['message'=>'basket Not Found'], 404);
        else{
            $basket->update($request->all());
            return response()->json($basket, 200);
        }
    }

    public function deleteBasket($id){
        $basket = Basket::find($id);
        if(is_null($basket))
            return response()->json(['message'=>'Basket Not Found'], 404);
        else{
            $basket->delete();
            return response()->json(null, 204);
        }
    }
}
