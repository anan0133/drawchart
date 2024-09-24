<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 */
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'is_admin',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function chart()
    {
        return $this->hasMany('App\Models\Chart', 'user_id', 'id');
    }  
   
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */ public function roles()
    {
        return $this->belongsToMany(
            config('laravel-permission.models.role'),
            config('laravel-permission.table_names.user_has_roles')
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(
            config('laravel-permission.models.permission'),
            config('laravel-permission.table_names.user_has_permissions')
        );
    }
     /**
     * Trait Hasrole
     */
    
    /**
     * Determine if the user may perform the given permission.
     *
     * @param string|Permission $permission
     *
     * @return bool
     */
    public function checkPermission($permission)
    {
        if (is_string($permission)) {
            $pm = Permission::where('name', $permission)->first();
        }

        if (!$pm) {
            throw new PermissionDoesNotExist();
        }

        return $this->hasDirectPermission($pm) || $this->hasPermissionViaRole($pm);
    }
    /**
     * The "booting" method of the model.
     *
     * @return void
    */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($user) {
            foreach(['chart' => 'delete'] as $relation => $action)
            {
                if($action == 'delete')
                {
                    foreach($user->{$relation} as $item)
                    {
                        $item->{$action}();
                    }
                }
                else if($action == 'detach')
                {
                    $user->{$relation}()->{$action}();
                }
            }
          
        });
    }

}