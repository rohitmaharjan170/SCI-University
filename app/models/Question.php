<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];

    public function options()
    {
        return $this->hasMany(Option::class,'question_id');
    }
}
