<?php

namespace App\Models;
use App\Notifications\AdminRessetPassword as ResetPasswordNotification;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $connection = 'mysql';
    protected $table = 'users';

    const STATUS_ACTIVE     = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $rememberTokenName = 'remember_token';

    protected $permissions = [];

    /**
     * The attributes that are date format.
     *
     * @var array
     */
    protected $dates = [
        'birthday',
        'verified'
    ];

    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'status' => 'int',
        'birthday' => 'datetime',
        'deleted' => 'datetime',
        'verified' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->email));
    }

    public function has($role)
    {
        $roles = $this->roles;
        if (isset($roles) && is_array($roles) && in_array($role, $roles)) {
            return true;
        }
        return false;
    }

    public function hasPerm($name)
    {
        return isset($this->perms[$name]);
    }

    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

    public function getEmbedded()
    {
        $fillable = [
            'id',
            'name',
            'avatar',
        ];

        $node = new User();
        $node->timestamps = false;

        foreach($fillable as $field) {
            $value = $this->{$field};
            if ($value instanceof Arrayable) {
                $node->{$field} = $value->toArray();
            } else {
                $node->{$field} = $value;
            }
        }

        return $node;
    }

    public function getRoleAttribute()
    {
        return reset($this->roles) ?? 'user';
    }

    public function getPermsAttribute()
    {
        if (empty($this->permissions) == false) {
            return $this->permissions;
        }
        $roles = resolve('roles');
        $list = Arr::only($roles, $this->roles);
        $this->permissions = [];
        foreach($list as $item) {
            $this->permissions = array_merge($this->permissions, $item);
        }
        ksort($this->permissions);
        return $this->permissions;
    }

    public static function getCollection($bucket = null)
    {
        $collection = [
            'status' => [
                '1' => __('backend::messages.active'),
                '0' => __('backend::messages.unactive'),
            ]
        ];

        return $collection[$bucket] ?? $collection;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setRolesAttribute($value)
    {
        $this->attributes['roles'] = json_encode($value);
    }

    public function getRolesAttribute($value)
    {
        return json_decode($value);
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = json_encode($value);
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }
    public function getLocationAttribute($value)
    {
        return json_decode($value);
    }
}
