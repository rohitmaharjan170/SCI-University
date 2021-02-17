<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CompanyAssociate extends Model
{
    protected $guarded = ['id'];

    public function getImagePathAttribute()
    {
        if ($this->logo) {
            $asset = asset('uploads/images/company-associate/' . $this->logo);
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
        return url('project/show/'.$this->id.'-'.str_slug($this->title_en));
    }
}
