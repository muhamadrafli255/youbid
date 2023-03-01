<?php

namespace Database\Seeders;

use App\Models\MultiplePrice;
use Illuminate\Database\Seeder;

class MultiplePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MultiplePrice::create([
            'category_id'   =>  1,
            'price'         =>  5000000,
        ]);
        MultiplePrice::create([
            'category_id'   =>  2,
            'price'         =>  1000000,
        ]);
    }
}
