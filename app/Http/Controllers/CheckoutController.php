<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCheckoutRequest;
use App\Repositories\PaymentRepositoryInterface;
use App\Services\CheckOutServiceInterface;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $service;
    protected $repository;

    public function __construct(
        CheckOutServiceInterface $service,
        PaymentRepositoryInterface $repository
    )
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function payment(PaymentCheckoutRequest $request)
    {
        $data = $request->validated();
        $data['ip'] = $request->ip();
        
        try {
            $payment = $this->service->makePayment($data);
            
            if (!$payment)
                return back();
                
            return redirect()->route('checkout.thanks', $payment);
            
        } catch(Exception $e) {
            dd($e->getMessage());
        }
        
    }

    public function thanks($paymentId)
    {
        if (!$payment = $this->repository->findById($paymentId))
            return back();
        
            $qrCode = null;
        
        if ($payment->billingType == 'PIX') {
            $qrCode = $this->service->getQrCodePayment($payment->invoiceNumber);
        }
        
        return view('checkout.thanks', compact('payment', 'qrCode'));
    }
}
