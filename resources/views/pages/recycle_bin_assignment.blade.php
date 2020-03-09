@extends('../master')
@section('recycle_bin','active')
@section('contains')
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </h1>
    <h3 class="text-center heading_text">All Recycle Bin Data</h3>
    @if($trash_data->count()==!0)
        <div class="container container_design">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($trash_data as $data)
                            <div class="col-md-3 card_box card-1">
                                <div class="text-center heading_text">{{$data->employee_name}}</div>
                                <div class="text-center heading_text">{{$data->employee_email}}</div>
                                <br/>
                                <?php
                                $i = 1;
                                $tasks = str_replace(array('[',']','"'),'',$data->task);
                                $arr_tasks = explode(",",$tasks);
                                foreach($arr_tasks as $task){
                                    echo "<div>".$i++.".  ".$task."</div>" ;
                                }
                                ?>
                                <br/>
                                <div class="text-center">Assign Date :{{$data->assign_date}}</div>
                                <div class="text-center">Completed Date :{{date('F d, Y', strtotime($data->created_at))}}</div>
                                <div class="text-center">Time : {{$data->time}} Working days</div>
                                <div class="text-center">Point : {{$data->point}}</div>
                                <br>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="/track/restore/{{$data->id}}">
                                                <button class="btn btn-primary btn-xs button_assignment">Restore</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/track/permanent/delete/{{$data->id}}">
                                                <button class="btn btn-danger btn-xs button_assignment">Delete</button>
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
        <h4 class='text-center heading_text'>No Assignment Available To See</h4>
    @endif
    {!! $trash_data->links() !!}
    @endsection
