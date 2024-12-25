<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';
    protected $primaryKey = ['permission_id', 'role_id'];
    public $incrementing = false;
    public $timestamps = false;


    public function roles()
{
    return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');
}

// public function permissions()
// {
//     return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
// }
public function permissions()
{
    return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
}


}
