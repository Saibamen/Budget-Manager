<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SourceController extends Controller {

    private function getRouteName() {
        return "source";
    }

    public function index() {
        $dataset = Source::select("id", "name", "type_id", "value", "comment", "created_at")
            ->with(["type" => function($query) {
                $query->select("id", "name");
            }])
            ->orderBy("name")
            ->paginate(20);

        $title = trans("general.sources");

        return view("list", ["dataset" => $dataset, "columns" => $this->getColumns(), "title" => $title]);
    }

    public function showAddEditForm($id = NULL) {
        if($id === NULL) {
            $dataset = new Source;
            // TODO
            $title = trans("general.add") . " " . mb_strtolower(trans("general.source"));
            $submit_route = route($this->getRouteName() . ".postadd");
        } else {
            try {
                $dataset = Source::findOrFail($id);
            } catch(ModelNotFoundException $e) {
                return Controller::returnBack([
                    "message" => trans("general.source_not_found"),
                    "alert-class" => "alert-danger"
                ]);
            }
            // TODO
            $title = trans("general.edit") . " " . mb_strtolower(trans("general.source"));
            $submit_route = route($this->getRouteName() . ".postedit", $id);
        }

        return view("addedit", ["dataset" => $dataset, "fields" => $this->getFields(), "title" => $title, "submit_route" => $submit_route]);
    }

    private function getColumns() {
        return [
        [
            "title" => trans("general.name"),
            "value" => function($data) {
                return $data->name;
            }
        ],
        [
            "title" => trans("general.type"),
            "value" => function($data) {
                if($data->type_id) {
                    return trans("general." . $data->type->name);
                }

                return NULL;
            }
        ],
        [
            "title" => trans("general.value"),
            "value" => function($data) {
                return $data->value;
            }
        ],
        [
            "title" => trans("general.added_date"),
            "value" => function($data) {
                return date("j.m.Y", strtotime($data->created_at));
            }
        ],
        [
            "title" => trans("general.comment"),
            "value" => function($data) {
                return $data->comment;
            }
        ],
        ];
    }

    private function getFields() {
        return [
        [
            "id" => "name",
            "title" => trans("general.name"),
            "value" => function($data) {
                return $data->name;
            }
        ],
        [
            "id" => "type_id",
            "title" => trans("general.type"),
            "value" => function($data) {
                if($data->type_id) {
                    return trans("general." . $data->type->name);
                }

                return NULL;
            }
        ],
        [
            "id" => "value",
            "title" => trans("general.value"),
            "value" => function($data) {
                return $data->value;
            }
        ],
        [
            "id" => "comment",
            "title" => trans("general.comment"),
            "value" => function($data) {
                return $data->comment;
            },
            "type" => "textarea"
        ],
        ];
    }

}
