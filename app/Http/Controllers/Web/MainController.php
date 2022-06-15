<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function home()
    {
        $data['products_count'] = Product::count();
        $data['pharmacies_count'] = Pharmacy::count();
        return Inertia::render('Home', ['data' => $data]);
    }
}
