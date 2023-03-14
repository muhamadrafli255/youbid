<?php

namespace Database\Seeders;

use App\Models\Lot;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lot::create([
            'item_id'       =>  1,
            'name'          =>  'LOT - 01',
            'location_id'   =>  1,
            'is_auction'    =>  1,
        ]);
    }
}
