<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupraIliaca extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'suprailiaca_r1', 'suprailiaca_r2', 'media_sir', 'suprailiaca_ls',
    ];
}
