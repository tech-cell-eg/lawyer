<?php

namespace Database\Seeders;

use App\Http\Controllers\CityController;
use App\Models\Category;
use App\Models\Language;
use App\Models\Lawyer;
use App\Models\Review;
use App\Models\User;
use Database\Factories\LawyerFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        Lawyer::factory(10)->create();
        $this->call([
            LawyerLangSeeder::class,
            CategoryLawyerSeeder::class
        ]);
        User::factory(3)->create();
        Review::factory(30)->create();
    }
}
