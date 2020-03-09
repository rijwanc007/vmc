@extends('../master')
@section('track_assignment','active')
@section('contains')
    <?php
    use App\TrackCompleteAssignment;
    use App\Assignment;
    ?>
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </h1>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center heading_text">Name : <span id="name"></span></div>
                    <div class="text-center heading_text">Email : <span id="email"></span></div>
                </div>
                <div class="modal-body">
                    <div>Assign Task Below :</div>
                    <div id="task"></div>
                    <div class="text-center">Assign Date : <span id="assign_date"></span></div>
                    <div class="text-center">Completed Date : <span id="complete_date"></span></div>
                    <div class="text-center">Time : <span id="time"></span> Working days</div>
                    <div class="text-center">Point : <span id="point"></span></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pending" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="text-center heading_text">Pending Assignment</h1>
                </div>
                {!! Form::open(['route' => 'reports.store','method' => 'POST']) !!}
                <div class="modal-body">
                    <input type="hidden" id="track_id" name="track_id"/>
                    <input type="hidden" id="employee_id" name="employee_id"/>
                    <input type="hidden" id="assignment_id" name="assignment_id"/>
                    <input type="hidden" id="employee_name" name="employee_name"/>
                    <input type="hidden" id="employee_email" name="employee_email"/>
                    <label>Set Point : <input type="text" id="total_point" class="input_padding" name="total_point" required/></label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Approved</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="approved" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="text-center heading_text">Approved Assignment</h1>
                </div>
                {!! Form::open(['route' => 'approved.edit','method' => 'POST']) !!}
                <div class="modal-body">
                <input type="hidden" id="approved_track_id" name="track_id"/>
                <input type="hidden" id="approved_employee_id" name="employee_id"/>
                <input type="hidden" id="approved_assignment_id" name="assignment_id"/>
                <input type="hidden" id="approved_employee_name" name="employee_name"/>
                <input type="hidden" id="approved_employee_email" name="employee_email"/>
                <label>Give Point : <input type="text" id="approved_total_point" class="input_padding" name="total_point" required/></label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Approved</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @foreach($users as $user)
        <div class="text-center">
            <div class="employee_assignment">{{$user->name}}</div>
            <code>{{$user->email}}</code>
        </div>
        <?php
        $complete_assignments = TrackCompleteAssignment::where('employee_id','=',$user->id)->orderBy('id','DESC')->get();
        ?>
    @if($complete_assignments->count()==!0)
        <div class="container container_design">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($complete_assignments as $complete_assignment)
                            <div class="col-md-3 card_box card-1">
                                <div class="text-center heading_text">{{$complete_assignment->employee_name}}</div>
                                <div class="text-center heading_text">{{$complete_assignment->employee_email}}</div>
                                <div>Completed Task Below :</div>
                                <?php
                                $i = 1;
                                $json = (json_decode($complete_assignment->task));
                                foreach($json as $key => $value){
                                echo "<div>".$i++.".  ".$value."</div>";
                                }
                                ?>
                                <br/>
                                <div class="text-center text-danger">Give Point : {{$complete_assignment->gain_point}}</div>
                                <div class="text-center">Assign Date :{{$complete_assignment->assign_date}}</div>
                                <div class="text-center">Completed Date :{{date('F d, Y', strtotime($complete_assignment->created_at))}}</div>
                                <div class="text-center">Time : {{$complete_assignment->time}} Working days</div>
                                <div class="text-center">Assign Point : {{$complete_assignment->point}}</div>
                                <br>
                                <table>
                                    <tr class="text-center button_center_three">
                                        <td>
                                            <?php
                                             $assignment = Assignment::where('id','=',$complete_assignment->assignment_id)->first();
                                            ?>
                                            <button class="btn btn-success btn-xs task" data-name="{{$complete_assignment->employee_name}}" data-email="{{$complete_assignment->employee_email}}" data-assign_date="{{$complete_assignment->assign_date}}" data-complete_date="{{date('F d, Y', strtotime($complete_assignment->created_at))}}" data-time="{{$complete_assignment->time}}" data-point="{{$complete_assignment->point}}" data-assignment_task="{{$assignment['task']}}" data-toggle="modal" data-target="#myModal">Task</button>
                                        </td>
                                        <td>
                                            @if($complete_assignment->admin_status == 'pending')
                                            <button class="btn btn-warning btn-xs pending" data-track_id="{{$complete_assignment->id}}" data-employee_id="{{$complete_assignment->employee_id}}" data-assignment_id="{{$complete_assignment->assignment_id}}" data-employee_name="{{$complete_assignment->employee_name}}" data-employee_email="{{$complete_assignment->employee_email}}" data-point="{{$complete_assignment->point}}" data-toggle="modal" data-target="#pending">{{$complete_assignment->admin_status}}</button>
                                                @else
                                                <button class="btn btn-warning btn-xs approved" data-track_id="{{$complete_assignment->id}}" data-employee_id="{{$complete_assignment->employee_id}}" data-assignment_id="{{$complete_assignment->assignment_id}}" data-employee_name="{{$complete_assignment->employee_name}}" data-employee_email="{{$complete_assignment->employee_email}}" data-point="{{$complete_assignment->point}}" data-gain_point="{{$complete_assignment->gain_point}}" data-toggle="modal" data-target="#approved">{{$complete_assignment->admin_status}}</button>
                                            @endif
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['track_complete_assignment.destroy',$complete_assignment->id],'method' => 'DELETE']) !!}
                                            <button class="btn btn-primary btn-xs">Recycle Bin</button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <a href="/track/permanent/delete/{{$complete_assignment->id}}">
                                                <button class="btn btn-danger btn-xs">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
    <h4 class='text-center heading_text'>{{$user->name}} Doesn't Complete Any Kind Of Assignment</h4>
    @endif
    @endforeach
    {!! $users->links() !!}
    <script>
        $(document).on('click','.task',function(){
            $('#task').empty();
           document.getElementById('name').innerHTML = $(this).data('name');
           document.getElementById('email').innerHTML = $(this).data('email');
           document.getElementById('assign_date').innerHTML = $(this).data('assign_date');
           document.getElementById('complete_date').innerHTML = $(this).data('complete_date');
           document.getElementById('time').innerHTML = $(this).data('time');
           document.getElementById('point').innerHTML = $(this).data('point');
            let i = 0;
            let j = 1;
            let assignment_task = $(this).data('assignment_task');
            for(i ; i<assignment_task.length ; i++){
               let node = document.createElement('DIV');
               let value = document.createTextNode(j+++' . '+assignment_task[i]);
               node.appendChild(value);
               document.getElementById('task').appendChild(node);
            }
        });
        $(document).on('click','.pending',function(){
           document.getElementById('track_id').value = $(this).data('track_id');
           document.getElementById('employee_id').value = $(this).data('employee_id');
           document.getElementById('assignment_id').value = $(this).data('assignment_id');
           document.getElementById('employee_name').value = $(this).data('employee_name');
           document.getElementById('employee_email').value = $(this).data('employee_email');
           document.getElementById('total_point').value = $(this).data('point');
        });
        $(document).on('click','.approved',function(){
            document.getElementById('approved_track_id').value = $(this).data('track_id');
            document.getElementById('approved_employee_id').value = $(this).data('employee_id');
            document.getElementById('approved_assignment_id').value = $(this).data('assignment_id');
            document.getElementById('approved_employee_name').value = $(this).data('employee_name');
            document.getElementById('approved_employee_email').value = $(this).data('employee_email');
            document.getElementById('approved_total_point').value = $(this).data('gain_point');
        })
    </script>
@endsection
