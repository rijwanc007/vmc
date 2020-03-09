@extends('../master')
@section('complete_assignment','active')
@section('contains')
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </h1>
@if($complete_assignments->count()==!0)
    <h1 class="text-center heading_text">All Submitted Assignment</h1>
    <div class="container container_design">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($complete_assignments as $complete_assignment)
                        <div class="col-md-3 card_box card-1">
                            <div class="text-center heading_text">{{$complete_assignment->employee_name}}</div>
                            <br/>
                            <?php
                            $i = 1;
                            $json = (json_decode($complete_assignment->task));
                            foreach($json as $key => $value){
                            echo "<div>".$i++.".  ".$value."</div>";
                            }
                            ?>
                            <br/>
                            <div class="text-center text-danger">Assignment : {{$complete_assignment->admin_status}}</div>
                            <div class="text-center text-danger">Gain Point : {{$complete_assignment->gain_point}}</div>
                            <div class="text-center">Assign Date :{{$complete_assignment->assign_date}}</div>
                            <div class="text-center">Completed Date :{{date('F d, Y', strtotime($complete_assignment->created_at))}}</div>
                            <div class="text-center">Assign Assignment Time : {{$complete_assignment->time}} Working days</div>
                            <div class="text-center">Assign Assignment Point : {{$complete_assignment->point}}</div>
                            <br>
                            {!! Form::open(['route' => ['complete_assignment.destroy',$complete_assignment->id],'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button>
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {!! $complete_assignments->links() !!}
    </div>
    @else
    <h1 class='text-center heading_text'>You Can't Complete Any Kind Of Assignment</h1>
    @endif
@endsection
