<?php

namespace App\Services\Payments;

class DummyPaymentGateway implements PaymentGateway
{
    /**
     * Dummy charge implementation
     */
    public function charge(float $amount, string $currency = 'USD', array $meta = []): array
    {
        return [
            'status' => 'success',
            'amount' => $amount,
            'currency' => $currency,
            'meta' => $meta,
            'transaction_id' => uniqid('txn_'),
        ];
    }
}
