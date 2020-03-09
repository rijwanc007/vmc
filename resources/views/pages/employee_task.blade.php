@extends('../master')
@section('task_active','active')
@section('contains')
    <h1 class="text-center heading_text">Assigned Task</h1>
     @if(!empty($tasks))
<div class="container container_design">
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <div class="col-md-3 card_box card-1">
                        {!! Form::open(['route' => 'complete_assignment.store','method'=>'POST']) !!}
                        <div class="text-center heading_text">{{$tasks['employee_name']}}</div>
                        <?php
                        $json = (json_decode($tasks['task']));
                        foreach($json as $key => $value){
                            echo "<div class='checkbox'><label><input type='checkbox' name='task[]' value='".$value."'/>".$value . "</div></label>";
                        }
                        ?>
                        <div class="text-center">Assign Date : {{ date('F d, Y', strtotime($tasks['created_at']))}}</div>
                        <div class="text-center">Time : {{$tasks['time']}} Working days</div>
                        <div class="text-center">Points : {{$tasks['point']}}</div>
                        <input type="hidden" name="assignment_id" value="{{$tasks['id']}}"/>
                        <input type="hidden" name="point" value="{{$tasks['point']}}"/>
                        <input type="hidden" name="time" value="{{$tasks['time']}}"/>
                        <input type="hidden" name="assign_date" value="{{ date('F d, Y', strtotime($tasks['created_at']))}}"/>
                        <input type="hidden" name="employee_id" value="{{$tasks['employee_id']}}"/>
                        <input type="hidden" name="employee_name" value="{{$tasks['employee_name']}}"/>
                        <input type="hidden" name="employee_email" value="{{$tasks['employee_email']}}"/>
                        <br/>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Completed" />
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
        @else
         <h1 class='text-center heading_text'>No Task Assign Yet</h1>
         @endif
@endsection
