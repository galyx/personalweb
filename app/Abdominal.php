<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abdominal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'abdominal_r1', 'abdominal_r2', 'media_ar', 'abdominal_ls',
    ];
}
