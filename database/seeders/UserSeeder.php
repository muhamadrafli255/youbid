<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Account
        $admin = User::create(
            [
                'nik'               =>  '3240987654326789',
                'full_name'         => 'Admin Satu',
                'email'             =>  'adminsatu@youb.id',
                'email_verified_at' =>  Carbon::now(),
                'password'          =>  Hash::make('adminsatu'),
                'gender'            =>  1,
                'phone_number'      =>  8989898992,
                'sub_district_id'   =>  3204180009,
                'full_address'      =>  'Kp Bojong Tanjung RT03 RW15',
                'postal_code'       =>  '40921',
                'bank_account_id'   =>  1,
                'is_complete'       =>  2,
                'role_id'           =>  1,
            ]
            );
            $admin->assignRole('admin');
            
        $admin = User::create(
            [
                'nik'               =>  '3240987654326797',
                'full_name'         => 'Admin Dua',
                'email'             =>  'admindua@youb.id',
                'email_verified_at' =>  Carbon::now(),
                'password'          =>  Hash::make('admindua2'),
                'gender'            =>  2,
                'phone_number'      =>  8989898882,
                'sub_district_id'   =>  3204180009,
                'full_address'      =>  'Kp Bojong Tanjung RT03 RW15',
                'postal_code'       =>  '40921',
                'bank_account_id'   =>  2,
                'is_complete'       =>  2,
                'role_id'           =>  1,
            ]
            );
            $admin->assignRole('admin');

            // Officer Account
            $officer = User::create(
                [
                    'nik'               =>  '3240987654321234',
                    'full_name'         => 'Petugas',
                    'email'             =>  'petugas@youb.id',
                    'email_verified_at' =>  Carbon::now(),
                    'password'          =>  Hash::make('akunpetugas'),
                    'gender'            =>  1,
                    'phone_number'      =>  8989891234,
                    'sub_district_id'   =>  3204180009,
                    'full_address'      =>  'Kp Bojong Tanjung RT03 RW15',
                    'postal_code'       =>  '40921',
                    'bank_account_id'   =>  3,
                    'is_complete'       =>  2,
                    'role_id'           =>  2,
                ]
                );
                $officer->assignRole('officer');

                // Member Account
                $member = User::create(
                    [
                        'nik'               =>  '3240987654312345',
                        'full_name'         => 'Masyarakat',
                        'email'             =>  'masyarakat@youb.id',
                        'email_verified_at' =>  Carbon::now(),
                        'password'          =>  Hash::make('masyarakat'),
                        'gender'            =>  1,
                        'phone_number'      =>  8989812345,
                        'sub_district_id'   =>  3204180009,
                        'full_address'      =>  'Kp Bojong Tanjung RT03 RW15',
                        'postal_code'       =>  '40921',
                        'bank_account_id'   =>  4,
                        'is_complete'       =>  2,
                    ]
                    );
                    $member->assignRole('society');
    }
}
