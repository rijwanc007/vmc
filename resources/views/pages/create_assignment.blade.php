@extends('../master')
@section('create_assignment','active')
@section('contains')
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </h1>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-3 col-md-offset-1 text-center">
                <button id="assignment_task" class="btn btn-default btn-lg btn-block" onclick="assignmentTask()">Task</button>
                <br/>
                <button id="assignment_time" class="btn btn-default btn-lg btn-block" onclick="assignmentTime()">Time</button>
                <br/>
                <button id="assignment_point" class="btn btn-default btn-lg btn-block" onclick="assignmentPoint()">Point</button>
                <br/>
                <button id="assignment_reset" class="btn btn-default btn-lg btn-block" onclick="assignmentReset()">Reset</button>
            </div>
            <div class="col-md-5">
                <h1 class="heading_text text-center">Assignment</h1>
                {!! Form::open(['id' => 'assignment_form','class' => '','route' => ['assignment.store'],'method' => 'POST']) !!}
                <div id="input_field"></div>
                <div id="input_field_time"></div>
                <div id="input_field_point"></div>
                <div class="dropdown">
                    <button class="btn btn-info btn-lg btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                        <span id="employee_name_button">Employee Name</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu col-md-12">
                        @foreach($employees as $employee)
                            <li class="role_value employee_value" data-employee_name="{{$employee->name}}" data-employee_email="{{$employee->email}}" data-employee_id="{{$employee->id}}">{{$employee->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <input type="hidden" id="employee_name" name="employee_name"/>
                <input type="hidden" id="employee_email" name="employee_email"/>
                <input type="hidden" id="employee_id" name="employee_id"/>
                <br>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Assigned" />
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        var i = 0;
        function increment(){
            i += 1;
        }
        $(document).on('click','.employee_value',function(){
            document.getElementById('employee_name_button').innerHTML = $(this).data('employee_name');
            document.getElementById('employee_name').value = $(this).data('employee_name');
            document.getElementById('employee_email').value = $(this).data('employee_email');
            document.getElementById('employee_id').value = $(this).data('employee_id');
        });
        function assignmentTask(){
            let node = document.createElement('INPUT');
            node.setAttribute('type','text');
            increment();
            node.setAttribute('name','task[]');
            node.setAttribute('id','assignment_'+i);
            node.setAttribute('class','input_padding');
            node.setAttribute('placeholder','Enter Your Task');
            $(node).prop("required", true);
            let node_two = document.createElement('INPUT');
            node_two.setAttribute('type','button');
            node_two.setAttribute('value','X');
            node_two.setAttribute('onclick','removeElement("assignment_'+i+'")');
            node_two.setAttribute('class','remove_input_element');
            document.getElementById('input_field').appendChild(node);
            document.getElementById('input_field').appendChild(node_two);
        }
        function removeElement(id){
            $('#'+id).remove();
        }
        $(document).on('click','.remove_input_element',function(){
            $(this).remove();
        });
        function assignmentTime(){
         let time = document.createElement('INPUT');
         time.setAttribute('type','text');
         time.setAttribute('name','assignment_time');
         time.setAttribute('class','input_padding');
         time.setAttribute('placeholder','Enter Assignment Completed Day');
         $(time).prop("required", true);
         document.getElementById('input_field_time').appendChild(time);
         document.getElementById('assignment_time').disabled = true;
        }
        function assignmentPoint(){
            let point = document.createElement('INPUT');
            point.setAttribute('type','text');
            point.setAttribute('name','assignment_point');
            point.setAttribute('class','input_padding');
            point.setAttribute('placeholder','Assignment Completed Point');
            $(point).prop("required", true);
            document.getElementById('input_field_point').appendChild(point);
            document.getElementById('assignment_point').disabled = true;
        }
        function assignmentReset(){
            $('#input_field').empty();
            $('#input_field_time').empty();
            $('#input_field_point').empty();
            document.getElementById('assignment_time').disabled = false;
            document.getElementById('assignment_point').disabled = false;
            document.getElementById('employee_name').innerHTML = 'Employee Name';
        }
    </script>
@endsection
