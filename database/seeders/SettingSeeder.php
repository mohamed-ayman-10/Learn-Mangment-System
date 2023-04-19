<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('settings')->delete();

        $data = [
            ["key" => "current_session", "value" => "2022-2023"],
            ["key" => "title", "value" => "LMS"],
            ["key" => "name", "value" => "Mohamed Ayman"],
            ["key" => "phone", "value" => "01021811237"],
            ["key" => "email", "value" => "mohamed@gmail.com"],
            ["key" => "address", "value" => "cairo"],
            ["key" => "logo", "value" => "logo.png"],
        ];

        DB::table('settings')->insert($data);
    }
}
