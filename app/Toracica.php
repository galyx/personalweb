<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toracica extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'toracica_r1', 'toracica_r2', 'media_t_r', 'toracica_ls',
    ];
}
