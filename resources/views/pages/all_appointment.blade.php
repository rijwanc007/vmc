@extends('../master')
@section('all_appointment','active')
@section('contains')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Email</h5>
                </div>
                {!! Form::open(['route'=>'email.send','method'=>'POST']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email address :</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Message :</label>
                        <textarea class="form-control" rows="5" id="email_message" name="email_message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="guest_name"></h4>
                </div>
                <div class="modal-body">
                    <div><strong>Email : </strong><span id="guest_email"></span></div>
                    <div><strong>Phone : </strong><span id="guest_phone"></span></div>
                    <br/>
                    <h3><span id="guest_message_name"></span> Message</h3>
                    <div id="guest_message"></div>
                    <br>
                    <h3>Appointment Requested Time</h3>
                    <div><strong>Date : </strong><span id="appointment_day"></span> <span id="appointment_month"></span> ,<span id="appointment_year"></span></div>
                    <div><strong>Time : </strong><span id="appointment_time"></span></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center heading_text">All Appointments</h1>
    <div class="container container_design_appointment">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($appointments as $appointment)
                    <div class="col-md-3 card_box card-1">
                        <p>Name : {{$appointment->name}}</p>
                        <p>Email : {{$appointment->email}}</p>
                        <p>Phone : {{$appointment->phone}}</p>
                        <p>Message : {{Str::limit($appointment->message,$limit=30,$end='...')}}</p>
                        <p>Date : {{$appointment->day}} {{$appointment->month}} , {{$appointment->year}}</p>
                        <p>Time : {{$appointment->time}}</p>
                        <div>
                            <table class="text-center button_center">
                                <tr>
                                    <td>
                                        <button class="btn btn-warning btn-xs appointment_show" data-name="{{$appointment->name}}" data-email="{{$appointment->email}}" data-phone="{{$appointment->phone}}" data-message="{{$appointment->message}}" data-day="{{$appointment->day}}" data-month="{{$appointment->month}}" data-year="{{$appointment->year}}" data-time="{{$appointment->time}}" data-toggle="modal" data-target="#myModal">show</button>
                                    </td>
                                    <td>
                                        @if($appointment->approve_status == 0)
                                        {!! Form::open(['route'=>['approve.mail'],'method' => 'POST']) !!}
                                        <input type="hidden" name="appointment_id" value="{{$appointment->id}}"/>
                                        <input type="hidden" name="appointment_mail" value="{{$appointment->email}}"/>
                                        <button type="submit" class="btn btn-primary btn-xs">Pending</button>
                                        {!! Form::close() !!}
                                        @elseif($appointment->approve_status == 1)
                                        <button type="submit" class="btn btn-success btn-xs approve_mail">Approved</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-xs button_reply" data-toggle="modal" data-target="#exampleModal" data-email="{{$appointment->email}}">Reply</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['calendar.destroy',$appointment->id],'method'=>'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {!! $appointments->links() !!}
    </div>
    <script>
        $(document).on('click','.button_reply',function(){
            document.getElementById('email_address').value  = $(this).data('email');
        });
        $(document).on('click','.approve_mail',function(){
            alert('You Already Approved These Appointment')
        });
        $(document).on('click','.appointment_show',function(){
            document.getElementById('guest_name').innerHTML = $(this).data('name');
            document.getElementById('guest_email').innerHTML = $(this).data('email');
            document.getElementById('guest_phone').innerHTML = $(this).data('phone');
            document.getElementById('guest_message').innerHTML = $(this).data('message');
            document.getElementById('guest_message_name').innerHTML = $(this).data('name');
            document.getElementById('appointment_day').innerHTML = $(this).data('day');
            document.getElementById('appointment_month').innerHTML = $(this).data('month');
            document.getElementById('appointment_year').innerHTML = $(this).data('year');
            document.getElementById('appointment_time').innerHTML = $(this).data('time');
        })
    </script>
@endsection
