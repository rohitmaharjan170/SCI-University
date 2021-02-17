<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/course/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function trainerCoursePath()
    {
        return url('trainer/course-actions/'.encrypt($this->id).'-'.$this->title_en);
    }

    public function studentCourseActions()
    {
        return url('student/course/course-actions/'.encrypt($this->id).'-'.$this->title_en);
    }

    public function images()
    {
        return $this->hasMany(CourseImage::class,'course_id')->latest();
    }

    public function videos()
    {
        return $this->hasMany(CourseVideo::class,'course_id')->latest();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'course_tags','course_id','tag_id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'course_student','course_id','student_id');
    }
}
