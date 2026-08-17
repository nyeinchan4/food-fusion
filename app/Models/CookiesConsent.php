<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CookiesConsent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'accepted',
        'accepted_at',
    ];
}

