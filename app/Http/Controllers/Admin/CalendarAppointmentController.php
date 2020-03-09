<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Mail\AppointmentReplyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class CalendarAppointmentController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function AllAppointment(){
        $appointments = Appointment::orderBy('id','DESC')->paginate(24);
        return view('pages/all_appointment',compact('appointments'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        Appointment::create([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'message' => $request->message,
           'day' => $request->day,
           'month' => $request->month,
           'year' => $request->year,
           'time' => $request->time,
           'approve_status' => 0,
        ]);
        return redirect('/calendar');
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
       $appointment_delete = Appointment::find($id);
       $appointment_delete->delete();
       return redirect('/all_appointment');
    }
    public function emailSend(Request $request){
        $comment = 'Hi, This is #VMC';
        Mail::to($request->appointment_mail)->send(new SendMail($comment));
        $update_approve_status = Appointment::find($request->appointment_id);
        $update_approve_status->update([
           'approve_status' => 1,
        ]);
        return redirect('/all_appointment');
    }
    public function appointmentReplyMail(Request $request){
        $comment = $request->email_message;
        Mail::to($request->email_address)->send(new AppointmentReplyMail($comment));
        return redirect('/all_appointment');
    }
}
