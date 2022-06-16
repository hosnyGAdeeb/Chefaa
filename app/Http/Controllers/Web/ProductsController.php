<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ProductStoreRequest;
use App\Http\Requests\Web\ProductUpdateRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Pharmacy;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        //
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
