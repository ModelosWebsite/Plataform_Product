<?php

namespace App\Http\Controllers\API\V;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentUpdateController extends Controller
{
    public function updatePayment(Request $request)
    {
        try {
            $payment = Payment::where('reference', $request->referenceCode)->first();

            if (!$payment) {
                return response()->json(['message' => 'Payment not found'], 404);
            }

            $payment->update(["status" => "Processado"]);

            return response()->json(['message' => 'Payment updated successfully'], 200);
        } catch (\Throwable $th) {
            Log::error('Error updating payment: ' . $th->getMessage());
            return response()->json(['message' => 'Error updating payment: ' . $th->getMessage()], 500);
        }
    }
}