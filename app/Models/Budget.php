<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model {

    protected $fillable = [
        "name", "source_id", "type_id", "value", "date", "user_id", "comment"
    ];

    public function source() {
        return $this->belongsTo(Source::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
