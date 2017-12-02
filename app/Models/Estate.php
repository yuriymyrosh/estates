<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $fillable = [
        'name',
        'address',
        'region_id',
        'room_option_id',
        'description',
        'phone',
    ];
}
