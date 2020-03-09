@extends('../master')
@section('reports','active')
@section('contains')
    <?php
    $i =1;
    ?>
    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="heading" class="text-center heading_text">Employee Point</h1>
                </div>
                {!! Form::open(['route' => 'report.edit','method' => 'POST']) !!}
                <div class="modal-body">
                    <div id="show_employee_name"></div>
                    <div id="show_employee_email"></div>
                    <br/>
                    <input type="hidden" id="id" name="id"/>
                    <input type="hidden" id="track_id" name="track_id"/>
                    <input type="hidden" id="employee_id" name="employee_id"/>
                    <input type="hidden" id="assignment_id" name="assignment_id"/>
                    <input type="hidden" id="employee_name" name="employee_name"/>
                    <input type="hidden" id="employee_email" name="employee_email"/>
                    <label>Total Point : <input type="text" id="total_point" class="input_padding" name="total_point" required/></label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Updated</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center heading_text">All Employee Point History</h3>
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table table-hover">
                    <thead>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Total Point</td>
                    <td>Option</td>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                        <td>{{$i++}}</td>
                        <td>{{$report->employee_name}}</td>
                        <td>{{$report->employee_email}}</td>
                        <td>{{$report->total_point}}</td>
                        <td>
                            <button class="btn btn-primary btn-xs edit" data-id="{{$report->id}}" data-track_id="{{$report->track_id}}" data-employee_id="{{$report->employee_id}}" data-assignment_id="{{$report->assignment_id}}" data-employee_name="{{$report->employee_name}}" data-employee_email="{{$report->employee_email}}" data-total_point="{{$report->total_point}}" data-toggle="modal" data-target="#edit">Edit</button>
                            <a href="{{url('/report/clear',$report->id)}}"><button class="btn btn-info btn-xs" >Clear</button></a>
                            <a href="{{url('/report/delete',$report->id)}}"><button class="btn btn-danger btn-xs">Delete</button></a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click','.edit',function(){
         document.getElementById('heading').innerHTML = $(this).data('employee_name') + ' Point';
         document.getElementById('show_employee_name').innerHTML ='Name : ' + $(this).data('employee_name');
         document.getElementById('show_employee_email').innerHTML ='Email : ' + $(this).data('employee_email');
         document.getElementById('id').value = $(this).data('id');
         document.getElementById('track_id').value = $(this).data('track_id');
         document.getElementById('employee_id').value = $(this).data('employee_id');
         document.getElementById('assignment_id').value = $(this).data('assignment_id');
         document.getElementById('employee_email').value = $(this).data('employee_email');
         document.getElementById('employee_name').value = $(this).data('employee_name');
         document.getElementById('total_point').value = $(this).data('total_point');
        });
    </script>
    @endsection
