<?php

use App\Models\Source;
use App\Models\Type;
use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder {

    public function run() {
        $dataset = [
            ["id" => 1, "name" => "Czynsz", "type_id" => Type::EXPENDITURE, "value" => NULL, "comment" => NULL],
            ["id" => 2, "name" => "Wypłata od pracodawcy ITMation S.A", "type_id" => Type::INCOME, "value" => 15000, "comment" => NULL],
            ["id" => 3, "name" => "Kino", "type_id" => Type::EXPENDITURE, "value" => NULL, "comment" => NULL],
            ["id" => 4, "name" => "Alkohol", "type_id" => Type::EXPENDITURE, "value" => NULL, "comment" => NULL],
            ["id" => 5, "name" => "Zakupy", "type_id" => Type::EXPENDITURE, "value" => NULL, "comment" => NULL],
            ["id" => 6, "name" => "Zysk z reklam", "type_id" => Type::INCOME, "value" => NULL, "comment" => NULL],
            ["id" => 7, "name" => "Dom", "type_id" => NULL, "value" => NULL, "comment" => NULL],
            ["id" => 8, "name" => "Środki czystości", "type_id" => Type::EXPENDITURE, "value" => NULL, "comment" => NULL],
            ["id" => 9, "name" => "Wypłata od pracodawcy Vitrosilicon S.A.", "type_id" => Type::INCOME, "value" => 7000, "comment" => NULL],
        ];

        foreach($dataset as $data) {
            Source::firstOrCreate($data);
        }
    }

}
