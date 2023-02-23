<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'bank_id'           =>  1,
            'account_owner'     =>  'Admin Satu',
            'account_number'    =>  '32049954'
        ]);
        BankAccount::create([
            'bank_id'           =>  1,
            'account_owner'     =>  'Admin Dua',
            'account_number'    =>  '320494980'
        ]);
        BankAccount::create([
            'bank_id'           =>  2,
            'account_owner'     =>  'Petugas',
            'account_number'    =>  '320491234'
        ]);
        BankAccount::create([
            'bank_id'           =>  2,
            'account_owner'     =>  'Masyarakat',
            'account_number'    =>  '32049123456'
        ]);
    }
}
