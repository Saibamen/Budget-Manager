<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model {

    protected $fillable = [
        "name", "source_id", "type_id", "value", "date", "user_id", "comment"
    ];

}
