<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmissionFile extends Model
{
    protected $guarded = ['id'];

    public function getFilePathAttribute()
    {
        if ($this->filename) {
            $asset = asset('uploads/assignment-submission-files/' . $this->filename);
        }
        return $asset;
    }
}
