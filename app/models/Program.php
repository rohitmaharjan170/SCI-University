<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/program/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function coursePath()
    {
        return url('student/programs/course-list/'.$this->id.'-'.str_slug($this->title_en));
    }

    public function images()
    {
        return $this->hasMany(ProgramImage::class,'program_id')->latest();
    }

    public function videos()
    {
        return $this->hasMany(ProgramVideo::class,'program_id')->latest();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'program_tags','program_id','tag_id');
    }

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class,'program_trainers','program_id','trainer_id');
    }

    public function category()
    {
        return $this->belongsTo(Program::class,'category_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class,'program_id');
    }
}
