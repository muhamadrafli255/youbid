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
            'opened_date'   =>  '2023-02-28 13:01',
            'closed_date'   =>  '2023-03-02 13:01',
            'location'      =>  'Bandung',
        ]);
    }
}