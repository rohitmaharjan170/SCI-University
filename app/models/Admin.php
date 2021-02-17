<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password','is_super','verify_token','verified','status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $asset = asset('uploads/images/admin/' . $this->image);
        } else {
            $asset = asset('uploads/images/no-image.jpg');
        }
        return $asset;
    }
}
