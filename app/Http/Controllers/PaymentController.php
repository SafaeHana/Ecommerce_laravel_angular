<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function listPayment(){
        return response()->json(Payment::all(), 200);
    }

    public function getPayment($id){
        $payment = Payment::find($id);
        if(is_null($payment))
            return response()->json(['message'=>'Payment Not Found'], 404);
        else
            return response()->json($payment, 200);
    }

    public function addPayment(Request $request){
        $payment = Payment::create($request->all());
        return response()->json($payment, 200);
    }

    public function updatePayment(Request $request, $id){
        $payment = Payment::find($id);
        if(is_null($payment))
            return response()->json(['message'=>'Payment Not Found'], 404);
        else{
            $payment->update($request->all());
            return response()->json($payment, 200);
        }
    }

    public function deletePayment($id){
        $payment = Payment::find($id);
        if(is_null($payment))
            return response()->json(['message'=>'Payment Not Found'], 404);
        else{
            $payment->delete();
            return response()->json(null, 204);
        }
    }
}