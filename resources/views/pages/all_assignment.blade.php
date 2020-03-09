@extends('../master')
@section('all_assignment','active')
@section('contains')
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </h1>
        <?php
        use App\Assignment;
        ?>
        @foreach($users as $user)
        <div class="text-center">
            <div class="employee_assignment">{{$user->name}}</div>
            <code>{{$user->email}}</code>
        </div>
        <?php
        $assignments = Assignment::where('employee_id','=',$user->id)->orderBy('id','DESC')->get();
        ?>
        @if($assignments->count() ==! 0)
    <div class="container container_design">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($assignments as $assignment)
                    <div class="col-md-3 card_box card-1">
                        <div class="text-center heading_text">{{$assignment->employee_name}}</div>
                        <div class="text-center heading_text">{{$assignment->employee_email}}</div>
                        <br/>
                        <?php
                            $i = 1;
                            $json = (json_decode($assignment->task));
                            foreach($json as $key => $value){
                                echo "<div>".$i++.".  ".$value."</div>";
                            }
                        ?>
                        <br/>
                        <div class="text-center">Assign Date :{{date('F d, Y', strtotime($assignment->created_at))}}</div>
                        <div class="text-center">Time : {{$assignment->time}} Working days</div>
                        <div class="text-center">Point : {{$assignment->point}}</div>
                        <br/>
                            <table>
                                <tr>
                                    <td>
                                    <a href="/assignment/edit/{{$assignment->id}}"><button class="btn btn-primary btn-xs button_assignment">Edit</button></a>
                                    </td>
                                    <td>
                                    <a href="/assignment/delete/{{$assignment->id}}"><button class="btn btn-danger btn-xs button_assignment">Delete</button></a>
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
            <h4 class="text-center heading_text">No Assignment Set Yet To {{$user->name}}</h4>
    @endif
        @endforeach
    {!! $users->links() !!}
@endsection
