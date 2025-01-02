<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Cities = [
            "New York",
            "London",
            "Tokyo",
            "Paris",
            "Dubai",
            "Singapore",
            "Hong Kong",
            "Los Angeles",
            "Sydney",
            "Berlin",
            "Toronto",
            "Mumbai",
            "Shanghai",
            "Istanbul",
            "Beijing",
            "São Paulo",
            "Moscow",
            "Mexico City",
            "Seoul",
            "Buenos Aires",
            "Rome",
            "Bangkok",
            "Delhi",
            "Cairo",
            "Jakarta",
            "Madrid",
            "Rio de Janeiro",
            "Lagos",
            "Chicago",
            "Kuala Lumpur",
            "Cape Town",
            "Melbourne",
            "Amsterdam",
            "Vienna",
            "San Francisco",
            "Mumbai",
            "Dubai",
            "Dublin",
            "Vancouver",
            "Copenhagen",
            "Brisbane",
            "Abu Dhabi",
            "Doha",
            "Zurich",
            "Oslo",
            "Helsinki",
            "Stockholm",
            "Lisbon",
            "Prague",
            "Warsaw",
            "Budapest"
        ];

        foreach ($Cities as $city) {
            City::create(["name" => $city]);
        }
    }
}
