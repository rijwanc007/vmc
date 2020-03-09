<?php

namespace App\Http\Controllers\Admin;

use App\Assignment;
use App\User;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CareerPointController extends Controller
{
    public function index(){
        $users = User::orderBy('id','DESC')->paginate(24);
        return view('pages.all_assignment',compact('users'));
    }
    public function create()
    {
        $employees = User::all();
       return view('pages.create_assignment',compact('employees'));
    }
    public function store(Request $request)
    {
        $assignment_find = Assignment::where('employee_id','=',$request->employee_id);
        if(!empty($assignment_find)){
            $assignment_find->update([
               'status' => 'deactivate',
            ]);
        }
        if(!empty($request->employee_name) && !empty($request->assignment_point) && !empty($request->assignment_time)){
            Assignment::create([
                'task' => json_encode($request->task),
                'point' => $request->assignment_point,
                'time' => $request->assignment_time,
                'status' => 'active',
                'employee_name' => $request->employee_name,
                'employee_email' => $request->employee_email,
                'employee_id' => $request->employee_id,
            ]);
        }else{
            Session::flash('success','Please Fill You Are Assignment Sequentially');
            return redirect()->back();
        }
           Session::flash('success','Assignment Created Successfully');
            return redirect('assignment');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $edit_employee = Assignment::find($id);
        return view('pages.edit_assignment',compact('edit_employee'));
    }
    public function update(Request $request, $id)
    {
        $assignment_update = Assignment::find($id);
        $assignment_update->update([
            'task' => json_encode($request->task),
            'point' => $request->assignment_point,
            'time' => $request->assignment_time,
            'employee_name' => $request->employee_name,
            'employee_email' => $request->employee_email,
            'employee_id' => $request->employee_id,
        ]);
        Session::flash('success','Assignment Updated Successfully');
        return redirect('assignment');
    }
    public function destroy($id)
    {
        $assignment_delete = Assignment::find($id);
        $assignment_delete->delete();
        Session::flash('success','Assignment Deleted Successfully');
        return redirect()->back();
    }
}
