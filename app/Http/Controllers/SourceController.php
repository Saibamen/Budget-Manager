<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller {

    public function index() {
        $dataset = Source::select("id", "name", "type_id", "value", "comment", "created_at")
            ->with(["type" => function($query) {
                $query->select("id", "name");
            }])
            ->orderBy("name")
            ->paginate(20);

        $title = "Źródła";

        $columns = [
        [
            "title" => "Nazwa",
            "value" => function($data) {
                return $data->name;
            }
        ],
        [
            "title" => "Typ",
            "value" => function($data) {
                if($data->type_id) {
                    return $data->type->name;
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
                return date("j.m.Y", strtotime($data->created_at));
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
