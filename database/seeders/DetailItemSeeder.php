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
        DetailItem::create([
            'machine_capacity'          => 150,
            'transmission'              =>  2,
            'police_number'             =>  'D 7898 SIU',
            'chassis_number'            =>  'YK9FF990',
            'machine_number'            =>  'YMP087LLD',
            'kilometers'                =>  20900,
            'fuel'                      =>  'Bensin',
            'physical_color'            =>  'HITAM',
            'vehicle_registration'      =>  1,
            'vehicle_registration_date' =>  '2023-05-02',
            'book_vehicle_owner'        =>  1,
            'invoice'                   =>  1,
            'receipt'                   =>  1,
            'owner_identity'            =>  0,
        ]);
        DetailItem::create([
            'machine_capacity'          => 150,
            'transmission'              =>  2,
            'police_number'             =>  'D 0777 XXS',
            'chassis_number'            =>  'YP09990',
            'machine_number'            =>  'YMP0MNJ89',
            'kilometers'                =>  20900,
            'fuel'                      =>  'Bensin',
            'physical_color'            =>  'HITAM',
            'vehicle_registration'      =>  1,
            'vehicle_registration_date' =>  '2023-05-02',
            'book_vehicle_owner'        =>  1,
            'invoice'                   =>  1,
            'receipt'                   =>  1,
            'owner_identity'            =>  0,
        ]);
        DetailItem::create([
            'machine_capacity'          => 1500,
            'transmission'              =>  2,
            'police_number'             =>  'D 0790 IN',
            'chassis_number'            =>  'YP09VOI',
            'machine_number'            =>  'YMP0MNLKO0',
            'kilometers'                =>  20900,
            'fuel'                      =>  'Bensin',
            'physical_color'            =>  'PUTIH',
            'vehicle_registration'      =>  1,
            'vehicle_registration_date' =>  '2023-05-02',
            'book_vehicle_owner'        =>  1,
            'invoice'                   =>  1,
            'receipt'                   =>  1,
            'owner_identity'            =>  0,
        ]);
        DetailItem::create([
            'machine_capacity'          => 1000,
            'transmission'              =>  2,
            'police_number'             =>  'F 9890 LOP',
            'chassis_number'            =>  'LO09VOI',
            'machine_number'            =>  'DHB0MNLKO0',
            'kilometers'                =>  20900,
            'fuel'                      =>  'Bensin',
            'physical_color'            =>  'KUNING',
            'vehicle_registration'      =>  1,
            'vehicle_registration_date' =>  '2023-05-02',
            'book_vehicle_owner'        =>  1,
            'invoice'                   =>  1,
            'receipt'                   =>  1,
            'owner_identity'            =>  0,
        ]);
        DetailItem::create([
            'machine_capacity'          => 1100,
            'transmission'              =>  2,
            'police_number'             =>  'D 9548 PLK',
            'chassis_number'            =>  'HBN09VOI',
            'machine_number'            =>  'NHB0MNLKO0',
            'kilometers'                =>  20900,
            'fuel'                      =>  'Bensin',
            'physical_color'            =>  'KUNING',
            'vehicle_registration'      =>  1,
            'vehicle_registration_date' =>  '2023-05-02',
            'book_vehicle_owner'        =>  1,
            'invoice'                   =>  1,
            'receipt'                   =>  1,
            'owner_identity'            =>  0,
        ]);
        DetailItem::create([
            'physical_color'            =>  'GOLD',
            'invoice'                   =>  1,
            'receipt'                   =>  1,
        ]);
        DetailItem::create([
            'physical_color'            =>  'PUTIH',
            'invoice'                   =>  1,
            'receipt'                   =>  1,
        ]);
    }
}
