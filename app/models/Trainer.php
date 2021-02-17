<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Trainer extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $guard = 'trainer';

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

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
        return $this->hasMany(Message::class, 'from', 'id')->where('is_trainer', 1)->where('seen', 0)->count();
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'trainer_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'trainer_id')->orderBy('created_at','desc');
    }
}
