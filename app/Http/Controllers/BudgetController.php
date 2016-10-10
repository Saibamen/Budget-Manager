<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use App\Models\Source;
use App\Models\Type;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BudgetController extends Controller {

    private function getRouteName() {
        return "budget";
    }

    public function index($type_id = NULL) {
        $title = trans("general.your_budget");

        if(isset($type_id)) {
            if($type_id == Type::EXPENDITURE) {
                $title .= " - " . mb_strtolower(trans("general.Expenditures"));
            } elseif($type_id == Type::INCOME) {
                $title .= " - " . mb_strtolower(trans("general.Incomes"));
            } else {
                $type_id = NULL;
            }
        }

        $dataset = Budget::select("id", "name", "source_id", "type_id", "value", "date", "user_id", "comment")
            ->with(["source" => function($query) {
                $query->select("id", "name");
            }, "type" => function($query) {
                $query->select("id", "name");
            }])
            ->when($type_id, function ($query) use ($type_id) {
                return $query->where("type_id", $type_id);
            })
            ->orderBy("date", "DESC")
            ->paginate(Controller::$items_per_page);

        /*if($dataset->count() === 0) {
            return Controller::returnBack([
                "message" => trans("general.games_not_found"),
                "alert-class" => "alert-danger"
            ]);
        }*/

        return view("list", ["dataset" => $dataset, "columns" => $this->getColumns(), "title" => $title, "route_name" => $this->getRouteName()]);
    }

    public function showAddEditForm($id = NULL) {
        if($id === NULL) {
            $dataset = new Budget;
            $title = trans("general.add");
            $submit_route = route($this->getRouteName() . ".postadd");
        } else {
            try {
                $dataset = Budget::findOrFail($id);
            } catch(ModelNotFoundException $e) {
                return Controller::returnBack([
                    "message" => trans("general.object_not_found"),
                    "alert-class" => "alert-danger"
                ]);
            }

            // TODO: Do funkcji... ale nie działa return
            if($dataset->user_id !== Auth::user()->id) {
                return Controller::returnBack([
                    "message" => trans("general.you_cant_operate"),
                    "alert-class" => "alert-danger"
                ]);
            }

            $title = trans("general.edit");
            $submit_route = route($this->getRouteName() . ".postedit", $id);
        }

        $title .= " " . mb_strtolower(trans("general.budget"));

        return view("addedit", ["dataset" => $dataset, "fields" => $this->getFields(), "title" => $title, "submit_route" => $submit_route]);
    }

    public function store(BudgetRequest $request, $id = NULL) {
        if($id === NULL) {
            $object = new Budget;
        } else {
            try {
                $object = Budget::findOrFail($id);
            } catch(ModelNotFoundException $e) {
                return Controller::returnBack([
                    "message" => trans("general.object_not_found"),
                    "alert-class" => "alert-danger"
                ]);
            }

            // TODO: Do funkcji... ale nie działa return
            if($object->user_id !== $user_id = Auth::user()->id) {
                return Controller::returnBack([
                    "message" => trans("general.you_cant_operate"),
                    "alert-class" => "alert-danger"
                ]);
            }
        }

        $request->request->add(["user_id" => $user_id]);

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
            "title" => trans("general.source"),
            "value" => function($data) {
                return $data->source->name;
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
            },
            "optional" => [
                "required" => "required"
            ]
        ],
        [
            "id" => "source_id",
            "title" => trans("general.source"),
            "value" => function($data) {
                return $data->source_id;
            },
            "selectable" => Source::pluck("name", "id"),
            "type" => "select",
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
                "required" => "required"
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
                "placeholder" => "0.00",
                "required" => "required"
            ]
        ],
        [
            "id" => "date",
            "title" => trans("general.date"),
            "value" => function($data) {
                if($data->date) {
                    return date("j.m.Y", strtotime($data->date));
                }

                return date("j.m.Y", strtotime(Carbon::now()));
            },
            "type" => "date",
            "optional" => [
                "required" => "required"
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
