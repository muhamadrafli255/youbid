<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'category_id'   =>  2,
            'name'          =>  'Yamaha',
            'image'         =>  'yamaha.png'
        ]);
        Brand::create([
            'category_id'   =>  2,
            'name'          =>  'Honda',
            'image'         =>  'honda.png'
        ]);
        Brand::create([
            'category_id'   =>  1,
            'name'          =>  'Toyota',
            'image'         =>  'toyota.png'
        ]);
        Brand::create([
            'category_id'   =>  1,
            'name'          =>  'Daihatsu',
            'image'         =>  'daihatsu.png'
        ]);
        Brand::create([
            'category_id'   =>  1,
            'name'          =>  'Honda Mobil',
            'image'         =>  'honda-mobil.png'
        ]);
        Brand::create([
            'category_id'   =>  3,
            'name'          =>  'RCB',
            'image'         =>  'rcb.png'
        ]);
    }
}
