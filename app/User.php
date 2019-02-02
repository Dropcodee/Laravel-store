<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin($role) {
        $userRole = User::where('type', $role)->get();
        if($userRole === 'admin') {
            return $userRole;
        }
    }
    public function isAuthor($role) {
        $userRole = User::where('type', $role)->get();
        if($userRole === 'author') {
            return $userRole;
        }
    }
    public function isUser($role) {
        $userRole = User::where('type', $role)->get();
        if($userRole === 'user') {
            return $userRole;
        }
    }
}
