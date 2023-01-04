<?php

namespace App\Models\RatesPlan;

use Illuminate\Database\Eloquent\Model;

class RatesPlan extends Model
{
    protected $table = 'rate_plans';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable =
    [
        'cancellation_id',
        'def_meal_available',
        'def_bookable',
        'def_minimum_stay',
        'base_rate',
        'extrabed_rate',
        'promo_rate',
        'is_rate_plan_activate',
        'is_promo_rate_activate',

    ];
}
