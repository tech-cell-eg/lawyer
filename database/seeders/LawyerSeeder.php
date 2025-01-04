<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Lawyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LawyerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i=1; $i < 11; $i++) { 
            Lawyer::create(
                [
                    "image_link" => env("APP_URL")."/images/lawyer-".$i.".png",
                    "name" => fake()->name(),
                    "biography" => fake()->paragraph(),
                    "city_id" => City::inRandomOrder()->first()->id,
                    "experience_years" => fake()->numerify("##"),
                    "hour_price" => fake()->numerify("###")
                ]
            );
        }
    }
}
