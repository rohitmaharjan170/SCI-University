<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/gallery/' . $this->image);
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
        return $this->hasMany(GalleryImages::class,'gallery_id')->latest();
    }
}
