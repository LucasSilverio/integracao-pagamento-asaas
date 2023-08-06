<?php

namespace App\Repositories;

interface PaymentRepositoryInterface
{
    public function create(array $data): string;
    public function findById(string $id): object|null;
}
