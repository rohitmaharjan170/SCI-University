<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function training()
    {
        return $this->belongsTo(Training::class,'training_id');
    }

    public function questionsWithOptions()
    {
        return $this->hasMany(Question::class,'exam_id')->with('options');
    }
}
