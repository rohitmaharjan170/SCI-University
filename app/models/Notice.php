<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/notice/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }
}
