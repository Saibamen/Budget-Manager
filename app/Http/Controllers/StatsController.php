<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceRequest;
use App\Models\Source;
use App\Models\Budget;
use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StatsController extends Controller {

    private function getRouteName() {
        return "stats";
    }

    public function getJSONStatsData() {
        $data = Budget::selectRaw("sum(value) as sum, user_id")
            ->where("type_id", Type::EXPENDITURE)
            ->with(["user" => function($query) {
                $query->select("id", "name");
            }])
            ->groupBy("user_id")
            ->get();

        $pie_data = [];

        foreach($data as $datas) {
            $pie_data += array_merge($pie_data, [[$datas->user->name, (float)$datas->sum]]);
        }

        return response()->json($pie_data);
    }

    public function index() {
        $title = trans("general.statistics");

        return view("stats", ["title" => $title]);
    }
}
