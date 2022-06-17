<?php

namespace App\Console\Commands;

use App\Http\Resources\ProductsResource;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SearchCheapestProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search-cheapest {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search the cheapest pharmacies that have this product limited to 5';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductRepositoryInterface $repo)
    {
        $id = $this->argument('id');
        $data = $repo->getProductWithCheapestPharmacies($id);

        $this->table(
            ['Product Title', 'Price'],
            [
                [
                    'Product Title' => $data['title'],
                    'Price' => $data['price'],
                ]
            ]
        );
        
        $this->table(
            ['Pharmacy', 'Price'],
            $data['pharmacies']->map(function ($pharmacy) {
                return [
                    'Pharmacy' => $pharmacy['name'],
                    'Price' => $pharmacy['pivot']['price'],
                ];
            }),
        );

    }

}
