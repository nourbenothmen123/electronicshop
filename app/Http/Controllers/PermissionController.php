<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:supprimer une permission',['only'=>['destroy']]);
    //     $this->middleware('permission:modifier une permission',['only'=>['update','edit']]);
    //     $this->middleware('permission:ajouter une permission',['only'=>['create','store']]);
    //     $this->middleware('permission:afficher la liste des permissions',['only'=>['index']]);
    // }
    public function index()
    {
        //$permissions=Permission::get();
        $permissions = Permission::query();
        $totalEntries = $permissions->count();
        

        if(request()->has('search'))
        {
            $permissions = $permissions->where('name','like','%'.request()->get('search').'%');
        }
    
        
        // Déterminer le nombre d'entrées à afficher
        $entries = request()->get('entries', 'all');
        if ($entries !== 'all') {
            $permissions = $permissions->paginate($entries);
        } else {
            $permissions = $permissions->get();
        }
        return view('role-permission.permission.PermissionIndex',compact('permissions','totalEntries'));

    }
    public function create()
    {
        return view('role-permission.permission.ajouter-permission-form');

    }
    public function store(Request $request)
    {
       $request->validate([
        'nompermission'=>[
            'required',
            'string',
            'unique:permissions,name'
        ]
    ]);
        Permission::create(
            [
                'name'=>$request->nompermission
            ]
        );
        $permissions = Permission::all();
        return redirect('/permissions')->with('success','la permission est crée avec succée !');

       
    }
    public function edit(Permission $permission)
    {
        
        return view('role-permission.permission.modifier-permission-form',['permission'=>$permission]);

    }
    public function update(Request $request,Permission $permission)
    {
        $request->validate([
            'nompermission'=>[
                'required',
                'string',
                Rule::unique('permissions', 'name')->where(function ($query) use ($request) {
                    return $query->where('name', $request->nompermission);
                })

            ]
        ]);
        $permission->update([
            'name'=>$request->nompermission
        ]);
        
        return redirect('/permissions')->with(['success'=>'La permission est modifiée avec succée !']);

    }
    public function destroy(Permission $permission)
    {
        $permission=Permission::find($permission->id);
        $permission->delete();
        return redirect('/permissions')->with('success','la permission est supprimée avec succée !');

    }
}
