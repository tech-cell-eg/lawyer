<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lawyer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryLawyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // every lawyer will have 1 or 2 or 3 or 4 category only 
        for ($i = 1; $i <= count(Lawyer::all()->toArray()); $i++) {
            for ($j = 1; $j <= rand(1, 4); $j++) {
                DB::table("category_lawyer")->insert([
                    "lawyer_id" => $i,
                    "category_id" => Category::inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
