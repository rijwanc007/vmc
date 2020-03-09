<?php

namespace App\Http\Controllers\Admin;


use App\TrackCompleteAssignment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TrackCompleteAssignmentController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(24);
        return view('pages.track_complete_assignment',compact('users'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
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
       $track_delete = TrackCompleteAssignment::find($id);
       $track_delete->delete();
       Session::flash('success','Assignment Send Recycle Bin Successfully');
       return redirect()->back();
    }
    public function trashed(){
        $trash_data = TrackCompleteAssignment::onlyTrashed()->orderBy('id','DESC')->paginate(24);
        return view('pages.recycle_bin_assignment',compact('trash_data'));
    }
    public function restore($id){
        $restore = TrackCompleteAssignment::withTrashed()->where('id','=',$id)->first();
        $restore->restore();
        Session::flash('success','Assignment Restore Successfully');
        return redirect('track_complete_assignment');
    }
    public function permanentDelete($id){
        $delete = TrackCompleteAssignment::withTrashed()->where('id','=',$id)->first();
        $delete->forceDelete();
        Session::flash('success','Assignment Deleted Permanently');
        return redirect()->back();
    }
}
