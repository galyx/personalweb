<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bioimpedancia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'gorduracorporal', 'massamuscular', 'agua', 'proteina', 'gorduravisceral', 'massaossea_p', 'massaossea_kg', 'idadecorporal', 'taxametabolismo',
    ];
}
