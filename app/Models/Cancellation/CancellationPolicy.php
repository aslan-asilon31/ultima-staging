<?php

namespace App\Models\Cancellation;

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
}
