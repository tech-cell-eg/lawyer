<?php

namespace Database\Seeders;

use App\Http\Controllers\CityController;
use App\Models\Category;
use App\Models\Language;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            LanguageSeeder::class,
            CitySeeder::class
        ]);
        // Category::factory(5)->create();
        // Language::factory(5)->create();
    }
}
