<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
        return Inertia::render('Products/Index');
//        return ProductsResource::collection(Product::paginate(50));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image',
            'title' => 'required',
            'description' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
