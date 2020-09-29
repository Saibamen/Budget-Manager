<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Budget.
 *
 * @property int            $id
 * @property string         $name
 * @property int            $source_id
 * @property int            $type_id
 * @property float          $value
 * @property string         $date
 * @property int            $user_id
 * @property string         $comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Source $source
 * @property-read \App\Models\Type $type
 * @property-read \App\Models\User $user
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereSourceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Budget whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Budget extends Model
{
    protected $fillable = [
        'name', 'source_id', 'type_id', 'value', 'date', 'user_id', 'comment',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            foreach ($model->attributes as $key => $value) {
                $model->{$key} = empty($value) ? null : $value;
            }
        });
    }

    public function setValueAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['value'] = str_replace(',', '.', $value);
        }
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
