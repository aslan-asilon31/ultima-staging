<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class PagePhoto extends Model
{
    protected $table = 'page_photo';
    protected $fillable = ['page_id', 'photo_path'];
}
