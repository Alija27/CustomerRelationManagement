<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("password"),
            "role" => "admin",
            "address" => "Nepal",
            "phonenumber" => "9812919812",
            "dob" => "2022/09/06",
            "bloodgroup" => "A+",
            "post" => "admin",
        ]);
    }
}
