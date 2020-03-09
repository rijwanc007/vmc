@extends('../master')
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
                <button id="assignment_time" class="btn btn-default btn-lg btn-block" onclick="assignmentTime()" disabled>Time</button>
                <br/>
                <button id="assignment_point" class="btn btn-default btn-lg btn-block" onclick="assignmentPoint()" disabled>Point</button>
                <br/>
                <button id="assignment_reset" class="btn btn-default btn-lg btn-block" onclick="assignmentReset()" disabled>Reset</button>
            </div>
            <div class="col-md-5">
                <h1 class="heading_text text-center">Assignment Update</h1>
                {!! Form::open(['id' => 'assignment_form','class' => '','route' => ['assignment.update',$edit_employee->id],'method' => 'PUT']) !!}
                <?php
                $json = (json_decode($edit_employee->task));
                foreach($json as $key => $value){
                    echo "<input type='text' id='".$key."' class='input_padding' name='task[]' placeholder='Update Assignment Task' value='$value' required/>";
                    echo '<input type="button" class="remove_input_element" onclick="removeElement('.$key.')" value="X"/>';
                }
                ?>
                <div id="input_field"></div>
                <input type="text" class="input_padding" name="assignment_time" placeholder="Update Assignment Completed Day" value="{{$edit_employee->time}}" required/>
                <input type="text" class="input_padding" name="assignment_point" placeholder="Update Assignment Completed Point" value="{{$edit_employee->point}}" required/>
                <div class="dropdown">
                    <button class="btn btn-info btn-lg btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                        <span id="employee_name_button">{{$edit_employee->employee_name}}</span>
                    </button>
                </div>
                <input type="hidden" id="employee_name" name="employee_name" value="{{$edit_employee->employee_name}}"/>
                <input type="hidden" id="employee_email" name="employee_email" value="{{$edit_employee->employee_email}}"/>
                <input type="hidden" id="employee_id" name="employee_id" value="{{$edit_employee->employee_id}}"/>
                <br>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update" />
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
    </script>
    @endsection
