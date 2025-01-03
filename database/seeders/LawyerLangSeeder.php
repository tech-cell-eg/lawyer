<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Lawyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LawyerLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) {
            DB::table("lawyer_language")->insert([
                "lawyer_id" => Lawyer::inRandomOrder()->first()->id,
                "language_id" => Language::inRandomOrder()->first()->id
            ]);
        }
    }
}
