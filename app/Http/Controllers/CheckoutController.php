<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCheckoutRequest;
use App\Services\CheckOutServiceInterface;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $service;

    public function __construct(CheckOutServiceInterface $service)
    {
        $this->service = $service;
    }

    public function payment(PaymentCheckoutRequest $request)
    {
        $data = $request->only(['name', 'cpfCnpj', 'email', 'phone', 'payment_method']);

        try {
            $info = $this->service->makePayment($data);
            dd($info);
            if (!$info)
                return back();
            
            return redirect()->route('checkout.thanks');
            
        } catch(Exception $e) {
            dd($e->getMessage());
        }
        
    }

    public function thanks()
    {
        return view('checkout.thanks');
    }
}
