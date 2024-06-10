<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Middleware\Role as MiddlewareRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

// use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use SearchableTrait;
    use SearchableTrait;
    use HasRoles;

    protected $searchable = [
        'columns' => [
            'users.name' => 10,
        ],
    ];

    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fcm_token',
        'nik',
        'username',
        'nip',
        'golongan',
        'jenis_pegawai',
        'jabatan',
        'role',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getPermissionGroup(){
        $permissionGroup = Permission::select('group_name')
                            ->groupBy('group_name')
                            ->get();
        return $permissionGroup;
    }

    public static function getPermissionByGroupname($groupName){
        $permissionByGroupName = Permission::select('id', 'name')
                            ->where('group_name', $groupName)
                            ->get();
        return $permissionByGroupName;
    }

    public static function roleHasPermissions($role, $permissions){
        $hasPermission = true;
        foreach ($permissions as $item) {
            # code...
            if(!$role->hasPermissionTo($item->name)){
                $hasPermission = false;
                // return $hasPermission;
            }
            return $hasPermission;
        }
    }

    public static function roleHasPermissionsGroup($role_id, $permissions, $group_permission){
        $role = Role::findById($role_id); // Admin
        $hasPermission = false;
        $permissionFix = Permission::where('group_name', $group_permission)->get();
        foreach ($permissionFix as $item) { // menu.pegawai   -> menu.permission
            # code...
            // if($role->hasPermissionTo('delete.permission')){
            if($role->hasPermissionTo($item->name)){
                $hasPermission = true;
                break;
            }else{
                $hasPermission = false;
            }
            
        }
        return $hasPermission;
    }
}
