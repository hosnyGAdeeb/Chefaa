<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Http\Resources\PharmaciesResource;
use App\Http\Resources\ProductsResource;
use App\Repositories\ProductRepositoryInterface;

class ProductsController extends Controller
{

    private $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return $this->paginatedResponse(ProductsResource::collection($this->repo->paginate()));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        try {
            return $this->successResponse(new ProductsResource($this->repo->create($request->only([
                'image',
                'title',
                'description',
                'price',
                'quantity',
                'pharmacies'
            ]))));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            return $this->successResponse(new ProductsResource($this->repo->find($id)));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param UpdateProductRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $updated = $this->repo->update($request->only([
                'image',
                'title',
                'description',
                'price',
                'quantity',
                'pharmacies'
            ]), $id);
            return $this->successResponse(new ProductsResource($updated));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            return $this->successResponse($this->repo->delete($id));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
