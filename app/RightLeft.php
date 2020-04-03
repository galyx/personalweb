<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RightLeft extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_code', 'af_n', 'arm_cd', 'arm_ce', 'arm_rd', 'arm_re', 'forearm_d', 'forearm_e', 'thigh_d', 'thigh_e', 'thigh_md', 'thigh_me', 'calf_d', 'calf_e',
    ];
}
