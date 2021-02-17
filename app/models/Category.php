<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/category/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function detailsPath()
    {
        return url('category/show/'.$this->id.'-'.str_slug($this->name_en));
    }

    public function programs()
    {
        return $this->hasMany(Program::class,'category_id');
    }
}
