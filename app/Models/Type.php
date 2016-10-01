<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Type
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Budget[] $budgets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Source[] $sources
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Type whereName($value)
 * @mixin \Eloquent
 */
class Type extends Model {

    const INCOME = 1;
    const EXPENDITURE = 2;

    public $timestamps = false;

    public function budgets() {
        return $this->hasMany(Budget::class);
    }

    public function sources() {
        return $this->hasMany(Source::class);
    }

}
