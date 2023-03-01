<?php

namespace Database\Seeders;

use App\Models\TicketPrice;
use Illuminate\Database\Seeder;

class TicketPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketPrice::create([
            'category_id'   =>  1,
            'price'         =>  500000,
        ]);
        TicketPrice::create([
            'category_id'   =>  2,
            'price'         =>  100000,
        ]);
    }
}
