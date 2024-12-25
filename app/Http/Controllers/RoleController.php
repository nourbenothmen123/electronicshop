<?php

namespace App\Http\Controllers;
use App\Models\Role as RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role ;
use Spatie\Permission\Models\Role_Has_Permission;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:supprimer rôle',['only'=>['destroy']]);
        $this->middleware('permission:modifier rôle',['only'=>['update','edit']]);
        $this->middleware('permission:ajouter rôle',['only'=>['create','store']]);
        $this->middleware('permission:afficher la liste des rôles',['only'=>['index']]);
        $this->middleware('permission:ajouter / modifier rôle permission',['only'=>['addPermissionToRole','givePermissionToRole']]);
    }
    public function index()
    {
        $roles = Role::query();
        $totalEntries = $roles->count();
        

        if(request()->has('search'))
        {
            $roles = $roles->where('name','like','%'.request()->get('search').'%');
        }

        // Déterminer le nombre d'entrées à afficher
        $entries = request()->get('entries', 'all');
        if ($entries !== 'all') {
            $roles = $roles->paginate($entries);
        } else {
            $roles = $roles->get();
        }
        return view('role-permission.role.RoleIndex',compact('roles','totalEntries'));
        
    }
    public function create()
    {
        return view('role-permission.role.ajouter-role-form');

    }
    public function store(Request $request)
    {
       $request->validate([
        'nomrôle'=>[
            'required',
            'string',
            'unique:roles,name'
        ]
    ]);
        Role::create(
            [
                'name'=>$request->nomrôle
            ]
        );
        
        return redirect('/roles')->with('success','le rôle est crée avec succée !');

       
    }
    public function edit(Role $role)
    {
        
        return view('role-permission.role.modifier-role-form',['role'=>$role]);

    }
    public function update(Request $request,Role $role)
    {
        $request->validate([
            'nomrôle'=>[
                'required',
                'string',
                Rule::unique('roles', 'name')->where(function ($query) use ($request) {
                    return $query->where('name', $request->nomrôle);
                })

            ]
        ]);
        $role->update([
            'name'=>$request->nomrôle
        ]);
        
        return redirect('/roles')->with(['success'=>'Le rôle est modifiée avec succée !']);

    }
    public function destroy(Role $role)
    {
        $roles=Role::find($role->id);
        $roles->delete();
        return redirect('/roles')->with('success','le rôle est supprimée avec succée !');

    }
    public function addPermissionToRole($roleId)
    {
        $permissions=Permission::all();
    $role=Role::findOrFail($roleId);
    $rolePermissions=DB::table('role_has_permissions')
    ->where('role_has_permissions.role_id',$role->id)
    ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
    ->all();
    return view('role-permission.role.ajouter-permission-au-role-form',
    ['role'=>$role,
    'permissions'=>$permissions,'rolePermissions'=>$rolePermissions]);
    }
    public function givePermissionToRole(Request $request,$roleId)
    {
        $request->validate([
            'permission'=>'required'

        ]);
        $role=Role::findOrFail($roleId);
        //Sync Permissions To A Role
        $role->syncPermissions($request->permission); 
        return redirect()->back()->with('success','Les permissions sont ajoutées au rôle');
    }

//     public function liste_rôle_permission(Request $request)
// {
//     $query = Role::with('permissions');

//     $searchRole = $request->input('searchRole');
//     $searchPermission = $request->input('searchPermission');

//     if ($searchRole || $searchPermission) {
//         $query->whereHas('permissions', function ($q) use ($searchRole, $searchPermission) {
//             if ($searchRole) {
//                 $q->whereHas('roles', function ($q) use ($searchRole) {
//                     $q->where('name', 'like', '%' . $searchRole . '%');
//                 });
//             }

//             if ($searchPermission) {
//                 $q->where('name', 'like', '%' . $searchPermission . '%');
//             }
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
//             if ($searchRole) {
//                 $q->whereHas('roles', function ($q) use ($searchRole) {
//                     $q->where('name', 'like', '%' . $searchRole . '%');
//                 });
//             }

//             if ($searchPermission) {
//                 $q->where('name', 'like', '%' . $searchPermission . '%');
//             }
//         });
//     }

//     $roles = $query->get();

//     return view('role-permission.role.RolePermissionIndex', compact('roles', 'searchRole', 'searchPermission'));
// }





}
