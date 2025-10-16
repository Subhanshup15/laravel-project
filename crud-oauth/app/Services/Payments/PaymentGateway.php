<?php

namespace App\Services\Payments;

interface PaymentGateway
{
    /**
     * Charge a payment
     *
     * @param float $amount
     * @param string $currency
     * @param array $meta
     * @return array
     */
    public function charge(float $amount, string $currency = 'USD', array $meta = []): array;
}
