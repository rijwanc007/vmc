@extends('../master')
@section('create_employee','active')
@section('contains')
    <div class="container">
        <h2 class="text-center heading_text">Create Employee</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        {!! Form::open(['class' => 'form-horizontal','route' => 'employee.store' ,'method' => 'post','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="name">Name : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="image">Image : </label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" placeholder="Enter Your Image" name="image" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="email">Email : </label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Enter Email Id" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="phone">Phone : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="description">Description :</label>
                <div class="col-sm-8">
                <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter Employee Description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="password" id="password">Password : </label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="confirm_password" id="confirm_password">Confirm Password : </label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
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
            <div class="col-md-8 col-md-offset-2">
                <br/><br/><br/>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(document).on('click','.role_value',function(){
           document.getElementById('role_button').innerHTML = $(this).data('role_name');
           document.getElementById('role_id').value = $(this).data('role_id');
           document.getElementById('role_name').value = $(this).data('role_name');
        })
    </script>
@endsection
