<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = ['id'];

    public function assignmentfiles()
    {
        return $this->hasMany(AssignmentFile::class,'assignment_id');
    }

    public function assignStudents()
    {
        return $this->belongsToMany(Student::class,'assignment_student','assignment_id','student_id');
    }

    public function studentSubmissionList()
    {
        return $this->belongsToMany(Student::class,'assignment_submission_student','assignment_id','student_id')->distinct();
    }
}
