<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Card;
use App\Models\LawyerMsg;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Review;
use App\Models\User;
use App\Models\UserMsg;
use Illuminate\Database\Seeder;

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
        Payment::factory(15)->create();
        Message::factory(15)->create();
    }
}
