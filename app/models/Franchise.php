<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->logo) {
            $asset = asset('uploads/images/franchise/' . $this->logo);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }
}
