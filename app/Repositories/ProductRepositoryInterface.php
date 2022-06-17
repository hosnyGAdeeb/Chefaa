<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function create(array $data);

    public function update(array $data, $id);

    public function filter(string $search, $orderKey, $orderDir, $perPage);

    public function getProductWithCheapestPharmacies($id);
}
