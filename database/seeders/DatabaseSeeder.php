<?php

namespace Database\Seeders;

use App\Http\Controllers\CityController;
use App\Models\Appointment;
use App\Models\Card;
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
    public function run(): void
    {
        User::factory(3)->create();
        $this->call([
            CategorySeeder::class,
            LanguageSeeder::class,
            CitySeeder::class,
            LawyerSeeder::class,
            LawyerLangSeeder::class,
            CategoryLawyerSeeder::class
        ]);
        Review::factory(50)->create();
        Appointment::factory(30)->create();
        Card::factory(10)->create();
    }
}
