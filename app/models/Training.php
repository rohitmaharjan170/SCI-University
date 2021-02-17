<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/training/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->hasMany(TrainingImage::class,'training_id')->latest();
    }

    public function videos()
    {
        return $this->hasMany(TrainingVideo::class,'training_id')->latest();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'training_tags','training_id','tag_id');
    }

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class,'training_trainers','training_id','trainer_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'training_student','training_id','student_id')->paginate(40);
    }
}
