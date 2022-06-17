<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\PharmaciesResource;
use App\Http\Resources\ProductsResource;
use App\Repositories\PharmacyRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PharmaciesController extends Controller
{

    private $repo;

    public function __construct(PharmacyRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        $data['pharmacies'] = PharmaciesResource::collection($this->repo->paginate());
        return Inertia::render('Pharmacies/Index', ['data' => $data]);
    }


    /**
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Pharmacies/Create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:pharmacies,name',
            'address' => 'required|max:255',
        ]);

        try {
            $this->repo->create($request->only(['name', 'address']));
            return redirect('/pharmacies');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

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
     * @param $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $data['pharmacy'] = new PharmaciesResource($this->repo->find($id));
        return Inertia::render('Pharmacies/Edit', ['data' => $data]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:pharmacies,name,' . $id,
            'address' => 'required|max:255',
        ]);

        try {
            $this->repo->update($request->only(['name', 'address']), $id);
            return back();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }


    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}
