<?php

namespace App\Services\Asaas;

use App\Services\CheckoutServiceInterface;
use Illuminate\Support\Facades\Http;

class CheckoutService implements CheckoutServiceInterface
{
    protected $customerId;

    public function makePayment(array $data)
    {
        $this->customerId = $this->createCustomer($data['name'], $data['email'], $data['cpfCnpj'], $data['phone']);

        $response = Http::withHeaders([
            'access_token' => env('ASAAS_KEY')
        ])->post(env('ASAAS_URL').'payments',[
            'customer'      => $this->customerId,
            'billingType'     => $data['payment_method'],
            'value'   =>  '100',
            'dueDate'     => '2023-08-07'
        ]);

        return $response->json();
    }

    /**
     * Método responśavel por criar o cliente na API da ASAAS
     */
    public function createCustomer(string $name, string $email, string $cpfCnpj, string $phone): string|null
    {
        $response = Http::withHeaders([
            'access_token' => env('ASAAS_KEY')
        ])->post(env('ASAAS_URL').'customers',[
            'name'      => $name,
            'email'     => $email,
            'cpfCnpj'   =>  $cpfCnpj,
            'phone'     => $phone
        ]);
        
        $data = $response->json();

        return $data['id'];
    }
}
