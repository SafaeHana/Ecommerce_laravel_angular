<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function listCard(){
        return response()->json(Card::all(), 200);
    }

    public function getCard($id){
        $card = Card::find($id);
        if(is_null($card))
            return response()->json(['message'=>'Card Not Found'], 404);
        else
            return response()->json($card, 200);
    }

    public function addCard(Request $request){
        $card = Card::create($request->all());
        return response()->json($card, 200);
    }

    public function updateCard(Request $request, $id){
        $card = Card::find($id);
        if(is_null($card))
            return response()->json(['message'=>'Card Not Found'], 404);
        else{
            $card->update($request->all());
            return response()->json($card, 200);
        }
    }

    public function deleteCard($id){
        $card = Card::find($id);
        if(is_null($card))
            return response()->json(['message'=>'Card Not Found'], 404);
        else{
            $card->delete();
            return response()->json(null, 204);
        }
    }
}