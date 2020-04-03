<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AF extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'date', 'goal', 'note', 'height', 'age', 'weight', 'sex',
    ];
}
