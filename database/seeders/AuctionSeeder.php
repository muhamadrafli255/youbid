<?php

namespace Database\Seeders;

use App\Models\Auction;
use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Auction::create([
            'lot_id'        =>  1,
            'opened_date'   =>  '2023-03-14 18:00',
            'closed_date'   =>  '2023-03-15 17:00',
            'initial_price' =>  15000000,
            'status'        =>  0,
        ]);
    }
}
