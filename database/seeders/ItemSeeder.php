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
        Item::create([
            'item_model_id'     =>  2,
            'detail_item_id'    =>  2,
            'item_code'         =>  'YOU-00002',
            'name'              =>  'MX KING 2020 VVA',
            'description'       =>  'MX KING 2020 VVA Warna Hitam Surat Komplit',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
        Item::create([
            'item_model_id'     =>  3,
            'detail_item_id'    =>  3,
            'item_code'         =>  'YOU-00003',
            'name'              =>  'R15 2020 VVA',
            'description'       =>  'R15 2020 VVA Warna Hitam Surat Komplit',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
        Item::create([
            'item_model_id'     =>  4,
            'detail_item_id'    =>  4,
            'item_code'         =>  'YOU-00004',
            'name'              =>  'Kijang Innova',
            'description'       =>  'Kijang Innova 2020 VVA Warna Putih Surat Komplit',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
        Item::create([
            'item_model_id'     =>  5,
            'detail_item_id'    =>  5,
            'item_code'         =>  'YOU-00005',
            'name'              =>  'Daihatsu Ayla',
            'description'       =>  'Daihatsu Ayla 2020 VVA Warna Kuning Surat Komplit',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
        Item::create([
            'item_model_id'     =>  6,
            'detail_item_id'    =>  6,
            'item_code'         =>  'YOU-00006',
            'name'              =>  'Honda Brio',
            'description'       =>  'Honda Brio 2020 VVA Warna Kuning Surat Komplit',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
        Item::create([
            'item_model_id'     =>  7,
            'detail_item_id'    =>  7,
            'item_code'         =>  'YOU-00007',
            'name'              =>  'Velg RCB SP811',
            'description'       =>  'Velg RCB SP811 Warna Gold',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
        Item::create([
            'item_model_id'     =>  8,
            'detail_item_id'    =>  8,
            'item_code'         =>  'YOU-00008',
            'name'              =>  'Velg RCB SP522',
            'description'       =>  'Velg RCB SP522 Warna Putih',
            'created_by'        =>  1,
            'is_auction'        =>  0,
        ]);
    }
}
