<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePharmacyRequest;
use App\Http\Requests\Api\UpdatePharmacyRequest;
use App\Http\Resources\PharmaciesResource;
use App\Repositories\PharmacyRepositoryInterface;
use Illuminate\Http\Request;

class PharmaciesController extends Controller
{

    private $repo;

    public function __construct(PharmacyRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            return $this->paginatedResponse(PharmaciesResource::collection($this->repo->paginate()));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * @param StorePharmacyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePharmacyRequest $request)
    {
        try {
            return $this->successResponse(new PharmaciesResource($this->repo->create($request->only([
                'name', 'address'
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
            return $this->successResponse(new PharmaciesResource($this->repo->find($id)));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param UpdatePharmacyRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePharmacyRequest $request, $id)
    {

        try {
            $updated = $this->repo->update($request->only([
                'name', 'address'
            ]), $id);
            return $this->successResponse(new PharmaciesResource($updated));
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
