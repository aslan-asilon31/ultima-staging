<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;

class RoomRatePlan extends Model
{
    protected $table = 'room_rate_plan';

    // public $primaryKey = 'id';

    // protected $keyType = 'string';

    // public $timestamps = true;

    // protected $guarded = []; 

    protected $fillable =
    [
        'room_id',
        'rate_id',
        'is_rate_plan_active',
        'promo_rate',
        'is_promo_rate_active',
    ];
}
