<?php

namespace Database\Seeders;

use App\Models\DetailItem;
use Illuminate\Database\Seeder;

class DetailItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailItem::create([
            'machine_capacity'          => 150,
            'transmission'              =>  1,
            'police_number'             =>  'B 4565 ERQ',
            'chassis_number'            =>  'YK90D990',
            'machine_number'            =>  'YM0987DSD',
            'kilometers'                =>  20900,
            'fuel'                      =>  'Bensin',
            'physical_color'            =>  'Biru',
            'vehicle_registration'      =>  1,
            'vehicle_registration_date' =>  '2023-05-02',
            'book_vehicle_owner'        =>  1,
            'invoice'                   =>  1,
            'receipt'                   =>  1,
            'owner_identity'            =>  0,
        ]);
    }
}
