<?php

namespace App\models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $guard = 'student';

    protected $fillable = [
        'name', 'email', 'password','verify_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/student/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function messageCount()
    {
        return $this->hasMany(Message::class,'from','id')->where('is_trainer',0)->where('seen',0)->count();
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_student','student_id','course_id');
    }

    public function training()
    {
        return $this->belongsToMany(Training::class,'training_student','student_id','training_id');
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class,'assignment_student','student_id','assignment_id')->orderBy('created_at','desc');
    }

    public function submittedAssignments()
    {
        return $this->hasMany(AssignmentFile::class,'student_id');
    }
}
