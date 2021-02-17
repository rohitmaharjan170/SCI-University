<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $guarded = ['id'];

    public function assignmentsubmissionfiles()
    {
        return $this->hasMany(AssignmentSubmissionFile::class, 'assignment_submission_id');
    }

    public function submitbystudents()
    {
        return $this->belongsToMany(Student::class,'assignment_submission_student','assignment_id','student_id');
    }
}
