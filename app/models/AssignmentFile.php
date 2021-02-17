<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AssignmentFile extends Model
{
    protected $guarded = ['id'];

    public function getFilePathAttribute()
    {
        if ($this->filename) {
            $asset = asset('uploads/assignment-files/' . $this->filename);
        }
        return $asset;
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class,'assignment_id');
    }
}
