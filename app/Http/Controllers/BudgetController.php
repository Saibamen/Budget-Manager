<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BudgetController extends Controller {

    private function getRouteName() {
        return "budget";
    }

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

        $title = trans("general.your_budget");

        return view("list", ["dataset" => $dataset, "columns" => $this->getColumns(), "title" => $title]);
    }

    public function showAddEditForm($id = NULL) {
        if($id === NULL) {
            $dataset = new Budget;
            // TODO
            $title = trans("general.add") . " " . mb_strtolower(trans("general.budget"));
            $submit_route = route($this->getRouteName() . ".postadd");
        } else {
            try {
                $dataset = Budget::findOrFail($id);
            } catch(ModelNotFoundException $e) {
                return Controller::returnBack([
                    "message" => trans("general.budget_not_found"),
                    "alert-class" => "alert-danger"
                ]);
            }
            // TODO
            $title = trans("general.edit") . " " . mb_strtolower(trans("general.budget"));
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
            "title" => trans("general.source"),
            "value" => function($data) {
                return $data->source->name;
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
            "title" => trans("general.date"),
            "value" => function($data) {
                return date("j.m.Y", strtotime($data->date));
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
            "id" => "source_id",
            "title" => trans("general.source"),
            "value" => function($data) {
                if($data->type_id) {
                    return $data->source->name;
                }

                return NULL;
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
            "id" => "date",
            "title" => trans("general.date"),
            "value" => function($data) {
                if($data->date) {
                    return date("j.m.Y", strtotime($data->date));
                }

                return date("j.m.Y", strtotime(Carbon::now()));
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
