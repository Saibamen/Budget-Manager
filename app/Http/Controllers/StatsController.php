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

    public function getJSONStatsData() {
        /*
         *   Wykres 1 - Wydatki z podziałem na użytkowników
         */
        $data = Budget::selectRaw("sum(value) as sum, user_id")
            ->where("type_id", Type::EXPENDITURE)
            ->with(["user" => function($query) {
                $query->select("id", "name");
            }])
            ->groupBy("user_id")
            ->get();

        $js_data[0] = [
            "title" => trans("general.expenditures_by_users"),
            "div_id" => "#stat",
            "js_chart_data" => ["name" => trans("general.Expenditures"), "data" => []]
        ];

        foreach($data as $record) {
            $js_data[0]["js_chart_data"]["data"] += array_merge($js_data[0]["js_chart_data"]["data"], [[$record->user->name, (float)$record->sum]]);
        }

        /*
         *   Wykres 2 - Wydatki z podziałem na źródła
         */
        $data2 = Budget::selectRaw("sum(value) as sum, source_id")
            ->where("type_id", Type::EXPENDITURE)
            ->with(["source" => function($query) {
                $query->select("id", "name");
            }])
            ->groupBy("source_id")
            ->get();

        $js_data[1] = [
            "title" => trans("general.expenditures_by_sources"),
            "div_id" => "#stat-2",
            "js_chart_data" => ["name" => trans("general.Expenditures"), "data" => []]
        ];

        foreach($data2 as $record) {
            $js_data[1]["js_chart_data"]["data"] += array_merge($js_data[1]["js_chart_data"]["data"], [[$record->source->name, (float)$record->sum]]);
        }

        return response()->json($js_data);
    }

    public function index() {
        // Nie wchodź, jeśli nie ma żadnych przychodów/wydatków w budżecie
        $count_expenditures = Budget::count("id");

        if($count_expenditures === 0) {
            return Controller::returnBack([
                "message" => trans("general.no_budget_records"),
                "alert-class" => "alert-info"
            ]);
        }

        $title = trans("general.statistics");

        return view("stats", ["title" => $title]);
    }
}
