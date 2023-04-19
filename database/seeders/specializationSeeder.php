<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class specializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();

        $specializations = [
            ['en' => 'Sciences', 'ar' => 'علوم'],
            ['en' => 'Physics', 'ar' => 'فيزياء'],
            ['en' => 'Biology', 'ar' => 'إحياء'],
            ['en' => 'Chemistry', 'ar' => 'كيمياء'],
            ['en' => 'Mathematics', 'ar' => 'رياضيات'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }
    }
}
