<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\RolePermission;
use App\Models\Role;
use App\Http\Requests\StoreRolePermissionRequest;
use App\Http\Requests\UpdateRolePermissionRequest;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRolePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function show(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function edit(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRolePermissionRequest  $request
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolePermissionRequest $request, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolePermission $rolePermission)
    {
        //
    }
//     public function liste_rôle_permission(Request $request)
// {
//     $query = RolePermission::query();

//     $searchRole = $request->input('searchRole');
//     $searchPermission = $request->input('searchPermission');

//     if ($searchRole && $searchPermission) {
//         $query->whereHas('permissions', function ($q) use ($searchRole, $searchPermission) {
//             $q->whereHas('roles', function ($q) use ($searchRole) {
//                 $q->where('name', 'like', '%' . $searchRole . '%');
//             })
//             ->where('name', 'like', '%' . $searchPermission . '%');
//         });
//     }

//     $roles = $query->get();

//     return view('role-permission.role.RolePermissionIndex', compact('roles', 'searchRole', 'searchPermission'));
// }
// public function liste_rôle_permission(Request $request)
// {
//     $query = RolePermission::query();

//     $searchRole = $request->input('searchRole');
//     $searchPermission = $request->input('searchPermission');

//     if ($searchRole && $searchPermission) {
//         $query->whereHas('permissions', function ($q) use ($searchRole, $searchPermission) {
//             $q->whereHas('roles', function ($q) use ($searchRole) {
//                 $q->where('name', 'like', '%' . $searchRole . '%');
//             });
//             $q->where('name', 'like', '%' . $searchPermission . '%');
//         });
//     }

//     $roles = $query->get();

//     return view('role-permission.role.RolePermissionIndex', compact('roles', 'searchRole', 'searchPermission'));
// }
// public function liste_rôle_permission(Request $request)
// {
//     $searchRole = $request->input('searchRole');
//     $searchPermission = $request->input('searchPermission');
//     $query = RolePermission::query();
    
//         if (!empty($searchRole)) {
//             $query->whereHas('roles', function ($q) use ($searchRole) {
//                 $q->where('name', 'like', '%' . $searchRole . '%');
//             });
//         }
    
//         if (!empty($searchPermission)) {
//             $query->whereHas('permissions', function ($q) use ($searchPermission) {
//                 $q->where('name', 'like', '%' . $searchPermission . '%');
//             });
//         }

//     $rolespermissions = $query->get();

//     return view('role-permission.role.RolePermissionIndex', compact('rolespermissions', 'searchRole', 'searchPermission'));
// }
 public function liste_rôle_permission(Request $request)
    {
        //$rolespermissions = Role::with('permissions')->get();
        $query = RolePermission::query();
        $searchRole = $request->input('searchRole');
        $searchPermission = $request->input('searchPermission'); // Nom de l'attribut recherché
    
        
    

    //     $query->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
    //   ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
    //   ->where('roles.name', 'like', '%' . $searchRole . '%' AND 'permissions.name' , 'like', '%' . $searchPermission . '%');
    
    $query->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
    ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id');

if ($searchRole) {
  $query->where('roles.name', 'like', '%' . $searchRole . '%');
}

if ($searchPermission) {
  $query->where('permissions.name', 'like', '%' . $searchPermission . '%');
}
    
        $rolespermissions = $query->get();

    return view('role-permission.role.RolePermissionIndex', compact('rolespermissions','searchRole','searchPermission'));
        

    }

}
