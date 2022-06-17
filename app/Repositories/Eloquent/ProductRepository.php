<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $data['image'] = $data['image']->store('/public/uploads/products');
        $pharmacies = $data['pharmacies'] ?? [];
        unset($data['pharmacies']);
        $product = $this->model->create($data);
        if (count($pharmacies)) {
            foreach ($pharmacies as $pharmacy) {
                $product->pharmacies()->attach($pharmacy['id'], ['price' => $pharmacy['price']]);
            }
        }
        return $product;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $product = $this->model->find($id);
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = $data['image']->store('/public/uploads/products');
        }
        $pharmacies = $data['pharmacies'] ?? [];
        unset($data['pharmacies']);
        $product->update($data);
        if (count($pharmacies)) {
            $product->pharmacies()->detach();
            foreach ($pharmacies as $pharmacy) {
                $product->pharmacies()->attach($pharmacy['id'], ['price' => $pharmacy['price']]);
            }
        }

        return $product;
    }

    /**
     * @param string $search
     * @param $orderKey
     * @param $orderDir
     * @return mixed
     */
    public function filter(string $search, $orderKey = 'id', $orderDir = 'DESC', $perPage = 20)
    {
        return $this->model
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orderBy($orderKey, $orderDir)
            ->paginate($perPage)
            ->withQueryString();
    }
}
