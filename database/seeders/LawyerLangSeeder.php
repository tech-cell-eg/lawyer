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
        // every lawyer will have 1 or 2 or 3 language only 
        for ($i=1; $i <= count(Lawyer::all()->toArray()); $i++) {
            for ($j=1; $j <= rand(1,3); $j++) {         
                DB::table("lawyer_language")->insert([
                    "lawyer_id" => $i,
                    "language_id" => Language::inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
