<?php

namespace App\Services;

interface CheckoutServiceInterface
{
    public function makePayment(array $data);
}