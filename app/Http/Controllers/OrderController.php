<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //lister toutes les commandes
    public function listOrder(){
        return response()->json(Order::all(), 200);
    }

    //selectionner une commande selon l'id
    public function getOrder($id){
        $order = Order::find($id);
        if(is_null($order))
            return response()->json(['message'=>'Order Not Found'], 404);
        else
            return response()->json($order, 200);
    }

    //ajouter une commande
    public function addOrder(Request $request){
        $order = Order::create($request->all());
        return response()->json($order, 200);
    }

    //modifier une commande
    public function updateOrder(Request $request, $id){
        $order = Order::find($id);
        if(is_null($order))
            return response()->json(['message'=>'Order Not Found'], 404);
        else{
            $order->update($request->all());
            return response()->json($order, 200);
        }
    }

    //supprimer une commande
    public function deleteOrder($id){
        $order = Order::find($id);
        if(is_null($order))
            return response()->json(['message'=>'Order Not Found'], 404);
        else{
            $order->delete();
            return response()->json(null, 204);
        }
    }
}