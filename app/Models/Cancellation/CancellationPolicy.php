<?php

namespace App\Models\Cancellation;

use Illuminate\Database\Eloquent\Model;

class CancellationPolicy extends Model
{
    protected $table = 'cancellation_policy';

    // public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable =
    [
        'id',
        'name',
        'description',
    ];
}
