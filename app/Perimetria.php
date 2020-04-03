<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perimetria extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'neck', 'deltoids', 'chest', 'abdome_c', 'abdome_m', 'hip',
    ];
}
