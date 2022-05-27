<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Client;

class clientController extends Controller
{
    public function listClient(){
        return response()->json(Client::all(), 200);
    }

    public function getClient($id){
        $client = Client::find($id);
        if(is_null($client))
            return response()->json(['message'=>'Client Not Found'], 404);
        else
            return response()->json($client, 200);
    }

    public function addClient(Request $request){
        $client = Client::create($request->all());
        return response()->json($client, 200);
    }

    public function updateClient(Request $request, $id){
        $client = Client::find($id);
        if(is_null($client))
            return response()->json(['message'=>'Client Not Found'], 404);
        else{
            $client->update($request->all());
            return response()->json($client, 200);
        }
    }

    public function deleteClient($id){
        $client = Client::find($id);
        if(is_null($client))
            return response()->json(['message'=>'client Not Found'], 404);
        else{
            $client->delete();
            return response()->json(null, 204);
        }
    }
}
