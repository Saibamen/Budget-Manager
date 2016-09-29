<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model {

    protected $fillable = [
        "name", "type_id", "value", "comment"
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function budgets() {
        return $this->hasMany(Budget::class);
    }

}
