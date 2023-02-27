<?php

namespace Database\Seeders;

use App\Models\ItemImage;
use Illuminate\Database\Seeder;

class ImageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemImage::create([
            'item_id'       =>  1,
            'image_name'    =>  'aerox1.jpeg'
        ]);
        ItemImage::create([
            'item_id'       =>  1,
            'image_name'    =>  'aerox2.jpeg'
        ]);
        ItemImage::create([
            'item_id'       =>  1,
            'image_name'    =>  'aerox3.jpeg'
        ]);
        ItemImage::create([
            'item_id'       =>  1,
            'image_name'    =>  'aerox4.jpeg'
        ]);
    }
}
