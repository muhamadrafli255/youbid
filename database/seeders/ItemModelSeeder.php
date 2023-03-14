<?php

namespace Database\Seeders;

use App\Models\ItemModel;
use Illuminate\Database\Seeder;

class ItemModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemModel::create([
            'brand_id'          =>  1,
            'name'              =>  'Aerox',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  1,
            'name'              =>  'MX - King',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  1,
            'name'              =>  'R15 V3',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  3,
            'name'              =>  'Kijang Innova',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  4,
            'name'              =>  'Ayla',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  5,
            'name'              =>  'Brio',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  6,
            'name'              =>  'SP811',
            'production_year'   =>  '2020'
        ]);
        ItemModel::create([
            'brand_id'          =>  6,
            'name'              =>  'SP522',
            'production_year'   =>  '2020'
        ]);
    }
}
