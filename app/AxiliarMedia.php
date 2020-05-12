<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AxiliarMedia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'axiliarmedia_r1', 'axiliarmedia_r2', 'media_amr', 'axiliarmedia_ls',
    ];
}
