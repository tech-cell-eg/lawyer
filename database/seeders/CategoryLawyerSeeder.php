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
        for ($i=0; $i < 10; $i++) {
            DB::table("category_lawyer")->insert([
                "lawyer_id" => Lawyer::inRandomOrder()->first()->id,
                "category_id" => Category::inRandomOrder()->first()->id
            ]);
        }
    }
}
