<?php

namespace Database\Seeders;

use App\Models\GradeItem;
use Illuminate\Database\Seeder;

class GradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeItem::create([
            'interior'  =>  'A',
            'exterior'  =>  'B',
            'machine'   =>  'B',
            'chassis'   =>  'B',
        ]);
    }
}
