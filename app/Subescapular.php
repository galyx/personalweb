<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subescapular extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'subescapular_r1', 'subescapular_r2', 'media_sr', 'subescapular_ls',
    ];
}
