<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "name" => "required|min:2|unique:sources,name," . $this->id,
            "type_id" => "exists:types,id",
            "value" => "numeric"
        ];
    }

}
