<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name' => "Rogério",
            'last_name' => "Tuzolana",
            'email'=> "tuzolanarogerio@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("12345678"),
            'remember_token' => Str::random(10),
            'type' => "admin",
        ]);
        
        User::create([
            'first_name' => "Edson",
            'last_name' => "Xauvunge",
            'email'=> "edson@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("12345678"),
            'remember_token' => Str::random(10),
            'type' => "admin",
        ]);

        User::create([
            'first_name' => "Yuri",
            'last_name' => "Rego",
            'email'=> "yuri@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("12345678"),
            'remember_token' => Str::random(10),
            'type' => "admin",
        ]);
    }
}
