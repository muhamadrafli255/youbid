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
    }
}
