<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function studentOptions()
    {
        return $this->hasMany(StudentAnswer::class,'exam_result_id');
    }
}
