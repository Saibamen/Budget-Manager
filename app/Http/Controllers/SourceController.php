<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceRequest;
use App\Models\Source;
use App\Models\Type;
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

        return view("list", ["dataset" => $dataset, "columns" => $this->getColumns(), "title" => $title, "route_name" => $this->getRouteName()]);
    }

    public function showAddEditForm($id = NULL) {
        if($id === NULL) {
            $dataset = new Source;
            $title = trans("general.add");
            $submit_route = route($this->getRouteName() . ".postadd");
        } else {
            try {
                $dataset = Source::findOrFail($id);
            } catch(ModelNotFoundException $e) {
                return Controller::returnBack([
                    "message" => trans("general.object_not_found"),
                    "alert-class" => "alert-danger"
                ]);
            }

            $title = trans("general.edit");
            $submit_route = route($this->getRouteName() . ".postedit", $id);
        }

        $title .= " " . mb_strtolower(trans("general.source"));

        return view("addedit", ["dataset" => $dataset, "fields" => $this->getFields(), "title" => $title, "submit_route" => $submit_route]);
    }

    public function store(SourceRequest $request, $id = NULL) {
        if($id === NULL) {
            $object = new Source;
        } else {
            try {
                $object = Source::findOrFail($id);
            } catch(ModelNotFoundException $e) {
                return Controller::returnBack([
                    "message" => trans("general.object_not_found"),
                    "alert-class" => "alert-danger"
                ]);
            }
        }

        $object->fill($request->all());
        $object->save();

        return redirect()->route($this->getRouteName() . ".index")
            ->with([
                "message" => trans("general.saved"),
                "alert-class" => "alert-success"
            ]);
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
                    return $data->type->name;
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
            },
            "optional" => [
                "required" => "required"
            ]
        ],
        [
            "id" => "type_id",
            "title" => trans("general.type"),
            "value" => function($data) {
                return $data->type_id;
            },
            "selectable" => Type::pluck("name", "id"),
            "type" => "select",
            "optional" => [
                "placeholder" => @trans("general.select_or_leave_blank")
            ]
        ],
        [
            "id" => "value",
            "title" => trans("general.value"),
            "value" => function($data) {
                return $data->value;
            },
            "type" => "number",
            "optional" => [
                "step" => "0.01",
                "placeholder" => "0.00"
            ]
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
