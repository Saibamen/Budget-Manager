<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
        $users = [
            ["id" => 1, "name" => "Tomek", "email" => "test@test.pl", "password" => Hash::make("test")],
            ["id" => 2, "name" => "Kasia", "email" => "user@test.pl", "password" => Hash::make("test")],
        ];

        foreach($users as $user) {
            User::firstOrCreate($user);
        }
    }

}
