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
        $creditCard = [];
        $creditCardHolderInfo = [];
        
        if ($data['payment_method'] == 'CREDIT_CARD') {
            $creditCard = $this->createCreditCardObject($data);
            $creditCardHolderInfo = $this->createCreditCardHolderInfoObject($data);
        }        
        
        $response = Http::withHeaders([
            'access_token' => env('ASAAS_KEY')
        ])->post(env('ASAAS_URL').'payments',[
            'customer'              => $this->customerId,
            'billingType'           => $data['payment_method'],
            'value'                 =>  '100',
            'dueDate'               => '2023-08-07',
            'creditCard'            => $creditCard,
            'creditCardHolderInfo'  => $creditCardHolderInfo,
            'remoteIp'              => $data['ip']
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

    public function createCreditCardObject(array $data)
    {
        
        $expiry = explode('/', $data['card_expiry']);
                
        $creditCard = [
            'holderName' => $data['holderName'],
            'number' => $data['card_number'],
            'expiryMonth' => $expiry[0],
            'expiryYear' => $expiry[1],
            'ccv' => $data['cvv'],
        ];
        
        return (object) $creditCard;
    }

    public function createCreditCardHolderInfoObject(array $data)
    {        
        $creditCardHolderInfo = [
            'name'          => $data['name_titular'],
            'email'         => $data['email_titular'],
            'cpfCnpj'       => $data['cpfCnpj_titular'],
            'postalCode'    => $data['cep_titular'],
            'addressNumber' => $data['residencia_titular'],
            'phone'         => $data['phone_titular'],
        ];
        
        return (object) $creditCardHolderInfo;
    }
}
