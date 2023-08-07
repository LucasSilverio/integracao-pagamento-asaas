<?php

namespace Tests\Feature\App\Repository\Eloquent;

use App\Models\Payment;
use App\Repositories\Eloquent\PaymentRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class PaymentRepositoryTest extends TestCase
{
    protected $repository;
    
    public function setUp(): void
    {
        $this->repository = new PaymentRepository(new Payment());

        parent::setUp();
    }
    
    public function test_create()
    {
        $data = [
            'id'                    => 'pay_2061491574247647',
            'customer'              => 'cus_000005389464',
            'value'                 => 100,
            'billingType'           => 'CREDIT_CARD',
            'status'                => 'PENDING',
            'invoiceUrl'            => 'https://sandbox.asaas.com/i/5770101852316573',
            'invoiceNumber'         =>  '03799674',
            'transactionReceiptUrl' =>  'https://sandbox.asaas.com/comprovantes/0947033446772476'

        ];

        $response = $this->repository->create($data);

        $this->assertNotNull($response);
        $this->assertIsString($response);
    }

    public function test_find_by_id()
    {
        $data = [
            'id'                    => 'pay_2061491574247647',
            'customer'              => 'cus_000005389464',
            'value'                 => 100,
            'billingType'           => 'CREDIT_CARD',
            'status'                => 'PENDING',
            'invoiceUrl'            => 'https://sandbox.asaas.com/i/5770101852316573',
            'invoiceNumber'         =>  '03799674',
            'transactionReceiptUrl' =>  'https://sandbox.asaas.com/comprovantes/0947033446772476'

        ];

        $id = $this->repository->create($data);

        $response = $this->repository->findById($id);
        
        $this->assertIsObject($response);
        $this->assertEquals($id, $response->id);

    }
}
