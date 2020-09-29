<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    public function run()
    {
        $dataset = [
            ['id' => Type::INCOME, 'name' => 'Income'],
            ['id' => Type::EXPENDITURE, 'name' => 'Expenditure'],
        ];

        foreach ($dataset as $data) {
            Type::firstOrCreate($data);
        }
    }
}
