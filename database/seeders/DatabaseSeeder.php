<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SubDistrictSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(BankAccountSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ItemModelSeeder::class);
        $this->call(DetailItemSeeder::class);
        $this->call(GradeItemSeeder::class);
        $this->call(ImageItemSeeder::class);
        $this->call(ItemSeeder::class);
    }
}
