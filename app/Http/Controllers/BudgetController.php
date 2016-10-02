<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller {

    public function index() {
        $dataset = Budget::select("id", "name", "source_id", "type_id", "value", "date", "user_id", "comment")
            ->with(["source" => function($query) {
                $query->select("id", "name");
            }, "type" => function($query) {
                $query->select("id", "name");
            }])
            ->orderBy("date", "DESC")
            ->paginate(20);

        /*if($dataset->count() === 0) {
            return Controller::returnBack([
                "message" => trans("general.games_not_found"),
                "alert-class" => "alert-danger"
            ]);
        }*/

        $title = "Twój budżet";

        $columns = [
        [
            "title" => "Nazwa",
            "value" => function($data) {
                return $data->name;
            }
        ],
        [
            "title" => "Źródło",
            "value" => function($data) {
                return $data->source->name;
            }
        ],
        [
            "title" => "Typ",
            "value" => function($data) {
                if($data->type_id) {
                    return trans("general." . $data->type->name);
                }

                return NULL;
            }
        ],
        [
            "title" => "Wartość",
            "value" => function($data) {
                return $data->value;
            }
        ],
        [
            "title" => "Data",
            "value" => function($data) {
                return date("j.m.Y", strtotime($data->date));
            }
        ],
        [
            "title" => "Komentarz",
            "value" => function($data) {
                return $data->comment;
            }
        ],
        ];

        return view("list", ["dataset" => $dataset, "columns" => $columns, "title" => $title]);
    }

}
