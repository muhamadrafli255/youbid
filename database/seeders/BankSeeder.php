<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name'  => 'Bank BCA',
            'image' =>  '/img/bank/bca.png',
        ]);
        Bank::create([
            'name'  => 'Bank BRI',
            'image' =>  '/img/bank/bri.png',
        ]);
        Bank::create([
            'name'  => 'Bank Mandiri',
            'image' =>  '/img/bank/mandiri.png',
        ]);
        Bank::create([
            'name'  => 'Bank BNI',
            'image' =>  '/img/bank/bni.png',
        ]);
        Bank::create([
            'name'  => 'Bank MEGA',
            'image' =>  '/img/bank/mega.png',
        ]);
        Bank::create([
            'name'  => 'Bank BTN',
            'image' =>  '/img/bank/btn.png',
        ]);
        Bank::create([
            'name'  => 'Bank Danamon',
            'image' =>  '/img/bank/danamon.png',
        ]);
        Bank::create([
            'name'  => 'Bank Permata',
            'image' =>  '/img/bank/permata.png',
        ]);
    }
}
