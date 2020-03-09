@extends('../master')
@section('edit_round','active')
@section('contains')
    <div class="container">
        <br/><br/>
        {!! Form::open(['route'=>['role.update',$role_data->id],'method'=>'PUT']) !!}
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2 text_align" for="role_name">Role Name : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="role_name" placeholder="Create Roll" name="role_name" value="{{$role_data->role_name}}" required>
                </div>
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-3">
                <h3 class="heading_text">Task</h3>
                @foreach($permissions as $permission)
                    @if($permission->permission_name=='task')
                        <div class="checkbox"><label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                        @foreach($role as $permit)
                                        @if($permit->id==$permission->id)
                                        checked
                                        @endif
                                        @endforeach
                        />{{$permission->permission_for}}</label></div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-3">
                <h3 class="heading_text">Schedule</h3>
                @foreach($permissions as $permission)
                    @if($permission->permission_name=='schedule')
                        <div class="checkbox"><label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                        @foreach($role as $permit)
                                        @if($permit->id==$permission->id)
                                        checked
                                        @endif
                                        @endforeach
                        />{{$permission->permission_for}}</label></div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-3">
                <h3 class="heading_text">Role</h3>
                @foreach($permissions as $permission)
                    @if($permission->permission_name=='role')
                        <div class="checkbox"><label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                        @foreach($role as $permit)
                                        @if($permit->id==$permission->id)
                                        checked
                                        @endif
                                        @endforeach
                        />{{$permission->permission_for}}</label></div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-3">
                <h3 class="heading_text">Point</h3>
                @foreach($permissions as $permission)
                    @if($permission->permission_name=='point')
                        <div class="checkbox"><label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                        @foreach($role as $permit)
                                        @if($permit->id==$permission->id)
                                        checked
                                        @endif
                                        @endforeach
                        />{{$permission->permission_for}}</label></div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h3 class="heading_text">Fashion</h3>
                @foreach($permissions as $permission)
                    @if($permission->permission_name=='fashion')
                        <div class="checkbox"><label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                        @foreach($role as $permit)
                                        @if($permit->id==$permission->id)
                                        checked
                                        @endif
                                        @endforeach
                        />{{$permission->permission_for}}</label></div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-3">
                <h3 class="heading_text">Employee</h3>
                @foreach($permissions as $permission)
                    @if($permission->permission_name=='employee')
                        <div class="checkbox"><label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                        @foreach($role as $permit)
                                        @if($permit->id==$permission->id)
                                        checked
                                        @endif
                                        @endforeach
                        />{{$permission->permission_for}}</label></div>
                    @endif
                @endforeach
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Roll</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
