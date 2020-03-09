@extends('../master')
@section('all_role','active')
@section('contains')
    <?php
    $i = 1;
    ?>
    <div class="container">
        <h3 class="text-center heading_text">All Role</h3>
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table table-hover">
                    <thead>
                    <td>#</td>
                    <td>Role Name</td>
                    <td>Option</td>
                    </thead>
                    <tbody>
                    @if($roles->count()==!0)
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$role->role_name}}</td>
                            <td>
                                <a href="{{route('role.edit',$role->id)}}"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <a href="{{url('/role/delete',$role->id)}}"><button class="btn btn-danger btn-xs">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="3">
                                No Role Created Yet
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
