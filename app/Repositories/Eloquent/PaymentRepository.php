<?php

namespace App\Repositories\Eloquent;

use App\Models\Payment as Model;
use App\Repositories\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;    
    }

    public function create(array $data): string
    {
        $data['paymentId'] = $data['id'];
        return $this->model->create($data)->id;
    }

    public function findById(string $id): ?object
    {
        return $this->model->find($id);
    }
}
