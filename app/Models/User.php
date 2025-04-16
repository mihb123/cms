<?php

namespace App\Models;

use App\Notifications\AdminRessetPassword as ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Check user has role with name
     * @example Auth::has('admin')
     * @example Auth::user()->has('admin')
     */
    public function has($role)
    {
        if (isset($this->roles) && is_array($this->roles) && in_array($role, $this->roles)) {
            return true;
        }
        return false;
    }

    /**
     * Check user has perm with name
     * @example Auth::hasPerm('backend.admin')
     * @example Auth::user()->hasPerm('backend.admin')
     */
    public function hasPerm($name)
    {
        return isset($this->perms[$name]);
    }
}
