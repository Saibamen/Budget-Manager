<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetRequest extends FormRequest {

    public function authorize() {
        // Autoryzacja na poziomie kontrolera
        return true;
    }

    public function rules() {
        return [
            "name" => "required|min:2",
            "source_id" => "required|exists:sources,id",
            "type_id" => "required|exists:types,id",
            "value" => "required|numeric",
            "date" => "required|date"
        ];
    }

}
