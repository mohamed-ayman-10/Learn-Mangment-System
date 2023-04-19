<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fee_types')->delete();

        $feeTypes = [
            [
                'ar' => "مصاريف مدرسيه",
                'en' => 'School Fee'
            ],
            [
                'ar' => "مصاريف كتب",
                'en' => 'Book Fee'
            ],
            [
                'ar' => "مصاريف باص",
                'en' => 'Bus Fee'
            ],
        ];

        foreach ($feeTypes as $feeType) {
            FeeType::create(['name' => $feeType]);
        }
    }
}
