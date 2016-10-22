<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->command->info("Creating types...");
        $this->call(TypesTableSeeder::class);

        $this->command->info("Creating sample users...");
        $this->call(UsersTableSeeder::class);

        $this->command->info("Creating sample sources...");
        $this->call(SourcesTableSeeder::class);

        $this->command->info("Creating sample budget items...");
        $this->call(BudgetsTableSeeder::class);
    }

}
