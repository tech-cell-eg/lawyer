<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name" => "abdulrahman atif",
            "email" => "a@a.a",
            "password" => bcrypt('12345678')
        ]);

        User::create([
            "name" => "mostafa abdulrahman",
            "email" => "m@m.m",
            "password" => bcrypt('12345678')
        ]);

        User::create([
            "name" => "abanoub talaat",
            "email" => "t@t.t",
            "password" => bcrypt('12345678')
        ]);
    }
}
