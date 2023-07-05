<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceRequest;
use App\Models\Source;
use App\Models\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SourceController extends Controller
{
    private function getRouteName()
    {
        return 'source';
    }

    private function isActionsRestricted()
    {
        return false;
    }

    public function getJSONSourceData($id)
    {
        $data = Source::select('type_id', 'value')
            ->where('id', $id)->first();

        return response()->json($data);
    }

    public function delete($id)
    {
        Source::destroy($id);

        $data = ['class' => 'alert-success', 'message' => trans('general.deleted')];

        return response()->json($data);
    }

    public function index($type_id = null)
    {
        $title = trans('general.sources');

        if (isset($type_id)) {
            if ($type_id == 0) {
                $title .= ' - '.mb_strtolower(trans('general.untyped'));
            } elseif ($type_id == Type::EXPENDITURE) {
                $title .= ' - '.mb_strtolower(trans('general.Expenditures'));
            } elseif ($type_id == Type::INCOME) {
                $title .= ' - '.mb_strtolower(trans('general.Incomes'));
            } else {
                $type_id = null;
            }
        }

        $dataset = Source::select('id', 'name', 'type_id', 'value', 'comment', 'created_at')
            ->with(['type' => function ($query) {
                $query->select('id', 'name');
            }])
            ->when($type_id, function ($query) use ($type_id) {
                if ($type_id != 0) {
                    return $query->where('type_id', $type_id);
                }

                return $query->where('type_id', null);
            }, function ($query) use ($type_id) {
                if ($type_id == 0 && $type_id != null) {
                    return $query->where('type_id', null);
                }

                return $query;
            })
            ->orderBy('name')
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
            $dataset = new Source();
            $title = trans('general.add');
            $submit_route = route($this->getRouteName().'.postadd');
        } else {
            try {
                $dataset = Source::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                return Controller::returnBack([
                    'message'     => trans('general.object_not_found'),
                    'alert-class' => 'alert-danger',
                ]);
            }

            $title = trans('general.edit');
            $submit_route = route($this->getRouteName().'.postedit', $id);
        }

        $title .= ' '.mb_strtolower(trans('general.source'));

        $view_data = [
            'dataset'      => $dataset,
            'fields'       => $this->getFields(),
            'title'        => $title,
            'submit_route' => $submit_route,
            'route_name'   => $this->getRouteName(),
        ];

        return view('addedit', $view_data);
    }

    public function store(SourceRequest $request, $id = null)
    {
        if ($id === null) {
            $object = new Source();
        } else {
            try {
                $object = Source::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                return Controller::returnBack([
                    'message'     => trans('general.object_not_found'),
                    'alert-class' => 'alert-danger',
                ]);
            }
        }

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
                'title' => trans('general.value'),
                'value' => function ($data) {
                    return $data->value;
                },
            ],
            [
                'title' => trans('general.added_date'),
                'value' => function ($data) {
                    return date('j.m.Y', strtotime($data->created_at));
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
            array_splice($dataset, 1, 0, [
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
                'id'    => 'type_id',
                'title' => trans('general.type'),
                'value' => function ($data) {
                    return $data->type_id;
                },
                'selectable' => Type::pluck('name', 'id'),
                'type'       => 'select',
                'optional'   => [
                    'placeholder' => trans('general.select_or_leave_blank'),
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
