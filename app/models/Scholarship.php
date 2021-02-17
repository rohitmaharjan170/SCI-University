<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $guarded = ['id'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getResumePathAttribute()
    {
        if ($this->resume) {
            $asset = asset('uploads/documents/scholarship/' . $this->resume);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }
}
