<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/event/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
