<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use App\Models\Source;
use App\Models\Type;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BudgetController extends Controller
{
    private function getRouteName()
    {
        return 'budget';
    }

    private function isActionsRestricted()
    {
        return true;
    }

    public function delete($id)
    {
        Budget::destroy($id);

        $data = ['class' => 'alert-success', 'message' => trans('general.deleted')];

        return response()->json($data);
    }

    public function index($type_id = null)
    {
        $title = trans('general.your_budget');

        if (isset($type_id)) {
            if ($type_id == Type::EXPENDITURE) {
                $title .= ' - '.mb_strtolower(trans('general.Expenditures'));
            } elseif ($type_id == Type::INCOME) {
                $title .= ' - '.mb_strtolower(trans('general.Incomes'));
            } else {
                $type_id = null;
            }
        }

        $dataset = Budget::select('id', 'name', 'source_id', 'type_id', 'value', 'date', 'user_id', 'comment')
            ->with(['source' => function ($query) {
                $query->select('id', 'name');
            }, 'type' => function ($query) {
                $query->select('id', 'name');
            }])
            ->when($type_id, function ($query) use ($type_id) {
                return $query->where('type_id', $type_id);
            })
            ->orderBy('date', 'DESC')
            ->paginate(Controller::getItemsPerPage());

        $view_data = [
            'dataset'               => $dataset,
            'columns'               => $this->getColumns($type_id),
            'title'                 => $title,
            'route_name'            => $this->getRouteName(),
            'is_actions_restricted' => $this->isActionsRestricted(),
        ];

        return view('list', $view_data);
    }

    public function showAddEditForm($id = null)
    {
        if ($id === null) {
            // Nie pozwalaj na dodawanie bez źródeł
            $count_sources = Source::count('id');

            if ($count_sources === 0) {
                return redirect()->route('source.addform')->with([
                    'message'     => trans('general.no_sources_for_budget'),
                    'alert-class' => 'alert-danger',
                ]);
            }

            $dataset = new Budget();
            $title = trans('general.add');
            $submit_route = route($this->getRouteName().'.postadd');
        } else {
            try {
                $dataset = Budget::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                return Controller::returnBack([
                    'message'     => trans('general.object_not_found'),
                    'alert-class' => 'alert-danger',
                ]);
            }

            if ((int) $dataset->user_id !== Auth::user()->id) {
                return Controller::returnBack([
                    'message'     => trans('general.you_cant_operate'),
                    'alert-class' => 'alert-danger',
                ]);
            }

            $title = trans('general.edit');
            $submit_route = route($this->getRouteName().'.postedit', $id);
        }

        $title .= ' '.mb_strtolower(trans('general.budget'));

        $view_data = [
            'dataset'      => $dataset,
            'fields'       => $this->getFields(),
            'title'        => $title,
            'submit_route' => $submit_route,
            'route_name'   => $this->getRouteName(),
        ];

        return view('addedit', $view_data);
    }

    public function store(BudgetRequest $request, $id = null)
    {
        if ($id === null) {
            $object = new Budget();
        } else {
            try {
                $object = Budget::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                return Controller::returnBack([
                    'message'     => trans('general.object_not_found'),
                    'alert-class' => 'alert-danger',
                ]);
            }

            if ((int) $object->user_id !== Auth::user()->id) {
                return Controller::returnBack([
                    'message'     => trans('general.you_cant_operate'),
                    'alert-class' => 'alert-danger',
                ]);
            }
        }

        $request->request->add(['user_id' => Auth::user()->id]);

        $object->fill($request->all());
        $object->save();

        return redirect()->route($this->getRouteName().'.index')
            ->with([
                'message'     => trans('general.saved'),
                'alert-class' => 'alert-success',
            ]);
    }

    private function getColumns($type_id = null)
    {
        $dataset = [
            [
                'title' => trans('general.name'),
                'value' => function ($data) {
                    return $data->name;
                },
            ],
            [
                'title' => trans('general.source'),
                'value' => function ($data) {
                    return $data->source->name;
                },
            ],
            [
                'title' => trans('general.value'),
                'value' => function ($data) {
                    return $data->value;
                },
            ],
            [
                'title' => trans('general.date'),
                'value' => function ($data) {
                    return date('j.m.Y', strtotime($data->date));
                },
            ],
            [
                'title' => trans('general.comment'),
                'value' => function ($data) {
                    return $data->comment;
                },
            ],
        ];

        // Dodawaj typ, jeśli jesteśmy na widoku ogólnym
        if ($type_id === null) {
            array_splice($dataset, 2, 0, [
                [
                    'id'    => 'type',
                    'title' => trans('general.type'),
                    'value' => function ($data) {
                        if ($data->type_id) {
                            return $data->type->name;
                        }

                        return null;
                    },
                ], ]);
        }

        return $dataset;
    }

    private function getFields()
    {
        return [
            [
                'id'    => 'name',
                'title' => trans('general.name'),
                'value' => function ($data) {
                    return $data->name;
                },
                'optional' => [
                    'required' => 'required',
                ],
        ],
        [
            'id'    => 'source_id',
            'title' => trans('general.source'),
            'value' => function ($data) {
                return $data->source_id;
            },
            'selectable' => Source::pluck('name', 'id'),
            'type'       => 'select',
            'optional'   => [
                'required'    => 'required',
                'data-url'    => url('/').'/source/json/',
                'placeholder' => trans('general.select'),
            ],
        ],
        [
            'id'    => 'type_id',
            'title' => trans('general.type'),
            'value' => function ($data) {
                return $data->type_id;
            },
            'selectable' => Type::pluck('name', 'id'),
            'type'       => 'select',
            'optional'   => [
                'required'    => 'required',
                'placeholder' => trans('general.select'),
            ],
        ],
        [
            'id'    => 'value',
            'title' => trans('general.value'),
            'value' => function ($data) {
                return $data->value;
            },
            'type'     => 'number',
            'optional' => [
                'step'        => '0.01',
                'placeholder' => '0.00',
                'required'    => 'required',
            ],
        ],
        [
            'id'    => 'date',
            'title' => trans('general.date'),
            'value' => function ($data) {
                if ($data->date) {
                    return date('j.m.Y', strtotime($data->date));
                }

                return date('j.m.Y', strtotime(Carbon::now()));
            },
            'optional' => [
                'required' => 'required',
            ],
        ],
        [
            'id'    => 'comment',
            'title' => trans('general.comment'),
            'value' => function ($data) {
                return $data->comment;
            },
            'type' => 'textarea',
        ],
        ];
    }
}
