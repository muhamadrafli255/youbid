<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name'  =>  'Bandung',
            'full_address'  =>  'Jl Kopo Katapang No.134'
        ]);

        Location::create([
            'name'  =>  'Jakarta',
            'full_address'  =>  'Jl Jend Sudirman No.90'
        ]);
    }
}
