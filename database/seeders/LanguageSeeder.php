<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Languages = [
            "English",
            "Mandarin Chinese",
            "Hindi",
            "Spanish",
            "French",
            "Arabic",
            "Bengali",
            "Russian",
            "Portuguese",
            "Urdu",
            "German",
            "Italian",
            "Dutch",
            "Greek",
            "Polish",
            "Swedish",
            "Turkish",
            "Japanese",
            "Korean",
            "Tamil",
            "Telugu",
            "Vietnamese",
            "Thai",
            "Swahili",
            "Hausa",
            "Amharic",
            "Yoruba",
            "Zulu",
            "Quechua",
            "Nahuatl",
            "Guarani",
            "Latin",
            "Sanskrit",
            "Classical Arabic",
            "Ancient Greek",
            "Hebrew"
        ];

        foreach ($Languages as $language) {
            Language::create(["name" => $language]);
        }
    }
}
