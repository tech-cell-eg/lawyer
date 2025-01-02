<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Civil lawyers",
            "Cyber lawyers",
            "Military lawyers",
            "Divorce lawyers ",
            "Family lawyers",
            "Contract lawyers",
            "Security lawyers",
            "Criminal lawyers",
            "Tax lawyers",
            "Labour lawyers",
        ];

        foreach ($categories as $category) {
            Category::create(["name" => $category]);
        }
    }
}
