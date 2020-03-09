<?php

namespace App\Http\Controllers\Admin;

use App\CompleteAssignment;
use App\Report;
use App\TrackCompleteAssignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('id','DESC')->get();
        return view('pages.report',compact('reports'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
       $complete = CompleteAssignment::where('assignment_id','=',$request->assignment_id);
       if(!empty($complete)){
           $complete->update([
              'admin_status' => 'approved',
              'gain_point' => $request->total_point,
           ]);
       }
       $track = TrackCompleteAssignment::where('assignment_id','=',$request->assignment_id);
       if(!empty($track)){
           $track->update([
              'admin_status' => 'approved',
              'gain_point' => $request->total_point,
           ]);
       }
        $total_point = Report::where('employee_email','=',$request->employee_email)->first();
        $check = Report::where('employee_email','=',$request->employee_email);
            if(empty($total_point)){
                Report::create([
                    'track_id' => $request->track_id,
                    'employee_id' => $request->employee_id,
                    'assignment_id' => $request->assignment_id,
                    'employee_name' => $request->employee_name,
                    'employee_email' => $request->employee_email,
                    'total_point' => $request->total_point,
                ]);
            }
            else{
                $check->update([
                   'total_point' => $total_point->total_point + $request->total_point,
                ]);
            }
       return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function approved(Request $request){
       $approved_complete_assignment = CompleteAssignment::where('assignment_id','=',$request->assignment_id)->first();
       $approved_report_total_point = Report::where('employee_email','=',$request->employee_email)->first();
       $approved_report_assignment = Report::where('employee_email','=',$request->employee_email)->first();
       $complete_assignment = CompleteAssignment::where('assignment_id','=',$request->assignment_id);
       $track_assignment = TrackCompleteAssignment::where('assignment_id','=',$request->assignment_id);
       $report_assignment = Report::where('employee_email','=',$request->employee_email);
       if(!empty($approved_report_assignment)){
           $report_assignment->update([
              'total_point' =>  $approved_report_total_point->total_point - $approved_complete_assignment->gain_point + $request->total_point,
           ]);
       }
       if(!empty($complete_assignment)){
           $complete_assignment->update([
               'gain_point' => $request->total_point,
           ]);
       }
       if(!empty($track_assignment)){
           $track_assignment->update([
              'gain_point' => $request->total_point,
           ]);
       }
       return redirect()->back();
    }
    public function reportEdit(Request $request){
        $report_edit = Report::find($request->id);
        $report_edit->update([
           'total_point' => $request->total_point,
        ]);
        return redirect()->back();
    }
    public function reportClear($id){
       $report_clear = Report::find($id);
       $report_clear->update([
          'total_point' => 0,
       ]);
       return redirect()->back();
    }
    public function reportDelete($id){
        $report_delete = Report::find($id);
        $report_delete->delete();
        return redirect()->back();
    }
}
