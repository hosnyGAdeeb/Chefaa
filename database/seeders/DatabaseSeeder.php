<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Product::factory(150)->create();
        Pharmacy::factory(50)->create();

        $pharmacies = Pharmacy::all();
        Product::all()->each(function ($product) use ($pharmacies) {
            $product->pharmacies()->attach($pharmacies->random(3)->pluck('id')->toArray(), [
                'price' => $product['price']
            ]);
        });


    }
}
