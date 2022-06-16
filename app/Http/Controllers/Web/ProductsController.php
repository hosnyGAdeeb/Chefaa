<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ProductStoreRequest;
use App\Http\Requests\Web\ProductUpdateRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Pharmacy;
use App\Repositories\ProductRepositoryInterface;
use Inertia\Inertia;

class ProductsController extends Controller
{

    private $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        $data['products'] = ProductsResource::collection($this->repo->paginate());
        return Inertia::render('Products/Index', ['data' => $data]);
    }

    /**
     * @return \Inertia\Response
     */
    public function create()
    {
        $data['pharmacies'] = Pharmacy::all()->map(function ($pharmacy) {
            return [
                'id' => $pharmacy['id'],
                'name' => $pharmacy['name'],
            ];
        });
        return Inertia::render('Products/Create', ['data' => $data]);
    }


    /**
     * @param ProductStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            $this->repo->create($request->only([
                'image',
                'title',
                'description',
                'price',
                'quantity',
                'pharmacies'
            ]));
            return redirect('/products');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @param $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $data['product'] = new ProductsResource($this->repo->find($id));
        return Inertia::render('Products/Show', ['data' => $data]);
    }


    /**
     * @param $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $data['pharmacies'] = Pharmacy::all()->map(function ($pharmacy) {
            return ['id' => $pharmacy['id'], 'name' => $pharmacy['name']];
        });
        $data['product'] = new ProductsResource($this->repo->find($id));
        return Inertia::render('Products/Edit', ['data' => $data]);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $this->repo->update($request->only([
                'image',
                'title',
                'description',
                'price',
                'quantity',
                'pharmacies'
            ]), $id);
            return back();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }


    /**
     *
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}
