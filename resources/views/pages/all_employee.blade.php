@extends('../master')
@section('all_employee','active')
@section('contains')
    <h1 class="text-center heading_text">All Employee</h1>
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </h1>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="modal_employee_name">Modal Header</h3>
                </div>
                <div class="modal-body">
                    <div><strong>Email : </strong><span id="modal_employee_email"></span></div>
                    <div><strong>Phone : </strong><span id="modal_employee_phone"></span></div>
                    <div><strong>Role : </strong><span id="modal_employee_role_name"></span></div>
                    <br/>
                    <h3>About <span id="modal_employee_name_two"></span></h3>
                    <br/>
                    <div id="modal_employee_description"></div>
                </div>
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Update Employee Information</h4>
                </div>
                <br/>
                {!! Form::open(['id'=>'employee_update_form','class' => 'form-horizontal','route' => 'employee.update' ,'method' => 'post','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="name">Name : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                    </div>
                </div>
                <img class="image_edit_preview" id="image_edit_preview" src="" alt="picture"/>
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="image">Image : </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="image" placeholder="Enter Your Image" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="email">Email : </label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Id" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="phone">Phone : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="description">Description :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter Employee Description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="password" id="password">Password : </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text_align" for="confirm_password" id="confirm_password">Confirm Password : </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control confirm_password" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                    </div>
                </div>
                <label class="control-label col-sm-2 text_align" for="role">Role : </label>
                <div class="col-sm-8">
                    <div class="dropdown">
                        <button class="btn btn-info btn-lg btn-block dropdown-toggle" type="button" data-toggle="dropdown"><span id="role_button">Employee Role</span>
                            <span class="caret"></span></button>
                        <input type="hidden" name="role_name" id="role_name"/>
                        <input type="hidden" name="role_id" id="role_id"/>
                        <ul class="dropdown-menu col-md-12">
                            @foreach($roles as $role)
                                <li class="role_value" data-role_id="{{$role->id}}" data-role_name="{{$role->role_name}}">{{$role->role_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="employee_id" id="employee_id"/>
                <div class="modal-footer modal_button">
                <div class="col-md-5">
                    <br/>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                </div>
                <div class="col-md-5">
                    <br/>
                    <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Close</button>
                </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif</div>
    </div>
    <div class="container container_design">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($employees as $employee)
                            <div class="col-md-3 card_box card-1">
                                <p><img class="employee_image" src="{{asset('employee_images/'.$employee->image)}}" alt=""></p>
                                <p>Name : {{$employee->name}}</p>
                                <p>Email : {{$employee->email}}</p>
                                <p>Phone : {{$employee->phone}}</p>
                                <p>Role Name : {{$employee->role_name}}</p>
                                <p>Description : {{Str::limit($employee->description,$limit=25,$end='...')}}</p>
                                <div>
                                    <table class="text-center button_center_two">
                                        <tr>
                                            <td>
                                                <button class="btn btn-success btn-xs show_employee approve_mail" data-name="{{$employee->name}}" data-email="{{$employee->email}}" data-phone="{{$employee->phone}}" data-description="{{$employee->description}}" data-role_name="{{$employee->role_name}}" data-toggle="modal" data-target="#myModal">show</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-xs edit_employee" data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-image="{{asset('employee_images/'.$employee->image)}}" data-email="{{$employee->email}}" data-phone="{{$employee->phone}}" data-description="{{$employee->description}}" data-role_name="{{$employee->role_name}}" data-toggle="modal" data-target="#edit_modal">Edit</button>
                                            </td>
                                            <td>
                                                {!! Form::open(['route' => ['employee.destroy',$employee->id],'method'=>'DELETE']) !!}
                                                <button class="btn btn-danger btn-xs">Delete</button>
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
        {!! $employees->links() !!}
    </div>
    <script>
        $(document).on('click','.show_employee',function(){
            document.getElementById('modal_employee_name').innerHTML  = $(this).data('name');
            document.getElementById('modal_employee_name_two').innerHTML = $(this).data('name');
            document.getElementById('modal_employee_email').innerHTML = $(this).data('email');
            document.getElementById('modal_employee_phone').innerHTML = $(this).data('phone');
            document.getElementById('modal_employee_role_name').innerHTML = $(this).data('role_name');
            document.getElementById('modal_employee_description').innerHTML = $(this).data('description');
        });
        $(document).on('click','.edit_employee',function(){
            $("#image").val('');
            document.getElementById('name').value = $(this).data('name');
            document.getElementById('image_edit_preview').src = $(this).data('image');
            document.getElementById('email').value = $(this).data('email');
            document.getElementById('phone').value = $(this).data('phone');
            document.getElementById('description').innerHTML = $(this).data('description');
            document.getElementById('role_button').innerHTML = $(this).data('role_name');
            document.getElementById('employee_id').value = $(this).data('id');
            // document.getElementById('role_name').value = $(this).data('role_name');
        });
        $(document).on('click','.role_value',function(){
            document.getElementById('role_button').innerHTML = $(this).data('role_name');
            document.getElementById('role_id').value = $(this).data('role_id');
            document.getElementById('role_name').value = $(this).data('role_name');
        })
    </script>
    @endsection
