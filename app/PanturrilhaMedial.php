<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PanturrilhaMedial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'panturrilhamedial_r1', 'panturrilhamedial_r2', 'media_pmr', 'panturrilhamedial_ls',
    ];
}
