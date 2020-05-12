<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicipital extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'bicipital_r1', 'bicipital_r2', 'media_br', 'bicipital_ls',
    ];
}
