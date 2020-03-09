<?php

namespace App\Http\Controllers\Admin;

use App\Assignment;
use App\CompleteAssignment;
use App\EmployeeCompleteAssignment;
use App\TrackCompleteAssignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompleteAssignmentController extends Controller
{
    public function index()
    {
        $complete_assignments = CompleteAssignment::where('employee_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(24);
        return view('pages.employee_completed_assignment',compact('complete_assignments'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $assignment_find = Assignment::where('employee_id','=',$request->employee_id);
        if(!empty($assignment_find)){
            $assignment_find->update([
                'status' => 'deactivate',
            ]);
        }
       CompleteAssignment::create([
          'task' => json_encode($request->task),
          'time' => $request->time,
          'point' => $request->point,
          'status' => 'complete',
          'assign_date' => $request->assign_date,
          'employee_name' => $request->employee_name,
          'employee_id' => $request->employee_id,
          'employee_email' => $request->employee_email,
          'assignment_id'  => $request->assignment_id,
           'admin_status' => 'pending',
       ]);
        TrackCompleteAssignment::create([
            'task' => json_encode($request->task),
            'time' => $request->time,
            'status' => 'complete',
            'point' => $request->point,
            'assign_date' => $request->assign_date,
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'employee_email' => $request->employee_email,
            'assignment_id'  => $request->assignment_id,
            'admin_status' => 'pending',
        ]);
       return redirect('complete_assignment');
     }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
      $delete = CompleteAssignment::find($id);
      $delete->delete();
      Session::flash('success','Assignment Deleted Successfully');
      return redirect()->back();
    }
}
