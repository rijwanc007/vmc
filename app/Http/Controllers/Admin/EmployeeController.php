<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
//        $employees = User::where('id','!=',Auth::user()->id)->orderBy('id','DESC')->paginate(24);
        $roles = Role::where('status','=','admin')->get();
        $employees = User::where('position','=','admin')->orderBy('id','DESC')->paginate(24);
      return view('pages.all_employee',compact('employees','roles'));
    }
    public function create()
    {
        $roles = Role::where('status','=','admin')->get();
      return view('pages.create_employee',compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
           'email' => 'unique:users',
        ]);
        if($request->password != $request->confirm_password){
            $request->validate([
                'password' => 'confirmed',
            ]);
        }
        $employee_pic = $request->file('image');
        $employee_pic_name = time().'.'.$employee_pic->getClientOriginalExtension();
        $employee_pic->move(public_path().'/employee_images/',$employee_pic_name);
        $employee = User::create([
           'name'        => $request->name,
           'image'       => $employee_pic_name,
           'email'       => $request->email,
           'phone'       => $request->phone,
           'description' => $request->description,
           'password'    => bcrypt($request->password),
           'role_name'   => $request->role_name,
            'position'   => 'admin',
        ]);
        $employee->roles()->sync($request->role_id);
        Session::flash('success','Employee Created Successfully');
        return redirect('employee');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
        $validation = User::where('id','!=',$request->employee_id)->where('email','=',$request->email)->get();
        if(count($validation)>0){
                    $request->validate([
                              'email' => 'unique:users',
                    ]);
        }
        if($request->password != $request->confirm_password){
            $request->validate([
                'password' => 'confirmed',
            ]);
        }
        $employee_pic = $request->file('image');
        $employee_update = User::find($request->employee_id);
        if(!empty($employee_pic)){
            unlink('employee_images/'.$employee_update->image);
            $employee_pic_name = time().'.'.$employee_pic->getClientOriginalExtension();
            $employee_pic->move(public_path().'/employee_images/',$employee_pic_name);
            $employee_update->update([
                'name'        => $request->name,
                'image'       => $employee_pic_name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'description' => $request->description,
            ]);
        }
        else{
            $employee_update->update([
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'description' => $request->description,
            ]);
        }
        if(!empty($request->password)){
            $employee_update->update([
                'password'    => bcrypt($request->password),
            ]);
        }
        if(!empty($request->role_name)){
            $employee_update->update([
                'role_name'   => $request->role_name,
            ]);
        }
        if(!empty($request->role_id)){
            $employee_update->roles()->sync($request->role_id);
        }
        Session::flash('success','Employee Updated Successfully');
        return redirect('employee');
    }
    public function destroy($id)
    {
         $delete_employee = User::find($id);
         $delete_employee->delete();
         unlink('employee_images/'.$delete_employee->image);
         Session::flash('success','Employee Deleted Successfully');
         return redirect('employee');
    }
}
