<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tricipital extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'tricipital_r1', 'tricipital_r2', 'media_tr', 'tricipital_ls',
    ];
}
