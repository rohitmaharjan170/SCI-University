<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FeaturedStudent extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/featured-student/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;

    }
}
