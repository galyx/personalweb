<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coxa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'coxa_r1', 'coxa_r2', 'media_cr', 'coxa_ls',
    ];
}
