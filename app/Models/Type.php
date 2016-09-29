<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    public $timestamps = false;

    public function budgets() {
        return $this->hasMany(Budget::class);
    }

    public function sources() {
        return $this->hasMany(Source::class);
    }

}
