<?php

namespace App\Models\Cancellation;

use App\Models\RatesPlan\RatesPlan;
use Illuminate\Database\Eloquent\Model;

class CancellationPolicy extends Model
{
    protected $table = 'cancellation_policy';

    public $primaryKey = 'id';

    protected $keyType = 'string';

    public $timestamps = true;

    protected $guarded = [];

    protected $fillable =
    [
        'id',
        'name',
        'description',
    ];

    // public function RatesPlan()
    // {
    //     return $this->hasOne(RatesPlan::class);
    // }

    public function rate_plan()
    {
        return $this->belongsTo('App\Models\RatesPlan\RatesPlan', 'id', 'cancellation_id');
    }
}
