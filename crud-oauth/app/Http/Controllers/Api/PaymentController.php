<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\Payments\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function charge(Request $request, PaymentGateway $gateway)
    {
        $data = $request->validate([
            'amount'   => 'required|numeric|min:0.5',
            'currency' => 'sometimes|string|size:3',
        ]);

        $response = $gateway->charge(
            $data['amount'],
            $data['currency'] ?? 'USD',
            ['user_id' => $request->user()->id]
        );

        $payment = Payment::create([
            'user_id'       => $request->user()->id,
            'amount'        => $response['amount'],
            'currency'      => $response['currency'],
            'status'        => $response['status'],
            'gateway'       => 'dummy',
            'transaction_id'=> $response['transaction_id'],
            'meta'          => $response['raw'] ?? [],
        ]);

        return response()->json([
            'payment' => $payment,
            'message' => $response['success'] ? 'Payment succeeded' : 'Payment failed',
        ], $response['success'] ? 201 : 422);
    }
}