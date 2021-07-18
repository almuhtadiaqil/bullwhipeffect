<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'username',
        'password',
        'role',
        'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    static function uploadPhoto($photo)
    {
        $image_path = null;
        if ($photo && $photo->isValid()) {
            $image_path = $photo->store('public/user');
        }
        return $image_path ? explode('public/user/', $image_path)[1] : $image_path;
    }
}
