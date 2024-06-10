<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{
    use HasFactory;

    public $table = "role_has_permissions";

    protected $fillable = ['role_id', 'permission_id'];
}
