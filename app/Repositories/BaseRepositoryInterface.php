<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function create(array $data);

    public function createMany(array $data);

    public function update(array $data, $id);

    public function find($id);

    public function findWhere(array $where);

    public function findWhereWith(array $where, array $with);

    public function first();

    public function last();

    public function get($orderKey, $orderDir);

    public function paginate($perPage, $orderKey, $orderDir);

    public function getWhere(array $where, $orderKey, $orderDir);

    public function getWhereWith(array $where, array $with, $orderKey, $orderDir);

    public function findWith($id, array $with);

    public function getWith(array $with, $orderKey, $orderDir);

    public function delete($id);

    public function count();
}
