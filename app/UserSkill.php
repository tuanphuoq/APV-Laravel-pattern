<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $fillable = [
        'id', 'id_user', 'id_skill', 'exp',
    ];
}
