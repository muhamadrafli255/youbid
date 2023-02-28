<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'item_model_id'     =>  1,
            'detail_item_id'    =>  1,
            'item_code'         =>  'YOU-00001',
            'name'              =>  'Aerox 2020 VVA',
            'description'       =>  'Aerox 2020 VVA Warna Biru Surat Komplit',
            'created_by'        =>  1,
            'is_auction'        =>  1,
        ]);
    }
}
