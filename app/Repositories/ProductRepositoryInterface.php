<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function create(array $data);

    public function update(array $data, $id);

}
