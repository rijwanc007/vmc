<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('status','=','admin')->get();
        return view('pages.all_role',compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('pages.create_role',compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create([
            'role_name' =>$request->role_name,
            'status' =>'admin'
        ]);
        $role->permissions()->sync($request->permission);
//        Session::flash('success','Admin Role Was Created Successfully');
        return redirect('role');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $role = Role::find($id)->permissions;
        $role_data = Role::find($id);
        $permissions = Permission::all();
        return view('pages.edit_role',compact('role','role_data','permissions'));
    }

    public function update(Request $request, $id)
    {
        $permission_update = Role::find($id);
        $permission_update->update([
            'role_name' =>$request->role_name
        ]);
        $permission_update->permissions()->sync($request->permission);
        return redirect('role');
    }
    public function destroy($id)
    {
        $role_find = Role::find($id);
        $user_role = User::where('role_name','=',$role_find->role_name);
        $user_role->update([
           'role_name' => "No Role Selected Yet",
        ]);
        $role_user = DB::table('role_user')->where('role_id','=',$id);
        $role_user->delete();
        $role_delete = Role::find($id);
        $permission_role = DB::table('permission_role')->where('role_id','=',$id);
        $role_delete->delete();
        $permission_role->delete();
        return redirect()->back();
    }
}
