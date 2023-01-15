<?php

namespace App\Models\RatesPlan;

use Illuminate\Database\Eloquent\Model;

class RatesPlan extends Model
{
    protected $table = 'rate_plans';

    public $primaryKey = 'id';

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable =
    [
        'id',
        'cancellation_id',
        'rate_name',
        'def_meal_available',
        'def_bookable',
        'def_minimum_stay',
        'base_rate',
        'extrabed_rate',


    ];
}
