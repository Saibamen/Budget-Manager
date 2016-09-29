<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
    	// Userzy
        $this->command->info("Creating sample users...");
        $this->call(UsersTableSeeder::class);
    }

}
