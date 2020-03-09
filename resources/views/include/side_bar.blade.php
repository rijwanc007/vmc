<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion navigation_design">
                    <li class=@yield('home_active')>
                        <a href="/home">Home</a>
                    </li>
                    @if(Gate::check('assign_assignment') || Gate::check('complete_assignment'))
                    <li>
                        <a href="#"><span>Task</span></a>
                        <ul>
                            @can('assign_assignment',Auth::user())
                            <li class=@yield('task_active')><a href="{{route('task.index')}}">Assign Assignment</a></li>
                            @endcan
                            @can('complete_assignment',Auth::user())
                            <li class=@yield('complete_assignment')><a href="{{route('complete_assignment.index')}}">Completed Assignment</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    @if(Gate::check('all_employee') || Gate::check('create_employee'))
                    <li>
                        <a href="#"><span>Employee</span></a>
                        <ul>
                            @can('all_employee',Auth::user())
                            <li class=@yield('all_employee')><a href="{{route('employee.index')}}">All Employee</a></li>
                            @endcan
                            @can('create_employee',Auth::user())
                            <li class=@yield('create_employee')><a href="{{route('employee.create')}}">Create Employee</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    <br>
                    @can('all_appointment',Auth::user())
                    <li>
                        <a href="#"> <span>Schedule</span></a>
                        <ul>
                            <li class=@yield('all_appointment')><a href="{{url('/all_appointment')}}">All Appointment</a></li>
                        </ul>
                    </li>
                    @endcan
                    <br>
                    @if(Gate::check('all_fashion') || Gate::check('create_fashion'))
                    <li>
                        <a><span>Fashion</span></a>
                        <ul>
                            @can('all_fashion',Auth::user())
                            <li class=@yield('all_fashion')><a href="{{route('fashion.index')}}">All Fashion</a></li>
                            @endcan
                            @can('create_fashion',Auth::user())
                            <li class=@yield('create_fashion')><a href="{{route('fashion.create')}}">Create Fashion</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    <br/>
                    @if(Gate::check('all_assignment') || Gate::check('create_assignment') || Gate::check('track_complete_assignment') || Gate::check('recycle_bin') || Gate::check('report'))
                    <li>
                        <a href="#"> <span>Point</span></a>
                        <ul>
                            @can('all_assignment',Auth::user())
                            <li class=@yield('all_assignment')><a href="{{route('assignment.index')}}">All Assignment</a></li>
                            @endcan
                            @can('create_assignment',Auth::user())
                            <li class=@yield('create_assignment')><a href="{{route('assignment.create')}}">Create Assignment</a></li>
                            @endcan
                            @can('track_complete_assignment',Auth::user())
                            <li class=@yield('track_assignment')><a href="{{route('track_complete_assignment.index')}}">Completed Assignment</a></li>
                            @endcan
                            @can('recycle_bin',Auth::user())
                            <li class=@yield('recycle_bin')><a href="{{route('recycle_bin')}}">Recycle Bin</a></li>
                            @endcan
                            @can('report',Auth::user())
                            <li class=@yield('reports')><a href="{{route('reports.index')}}">Report</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    <br>
                    @if(Gate::check('all_role') || Gate::check('create_role'))
                    <li>
                        <a href="#"> <span>Role</span></a>
                        <ul>
                            @can('all_role',Auth::user())
                            <li class=@yield('all_role')><a href="{{route('role.index')}}">All Role</a></li>
                            @endcan
                            @can('create_role',Auth::user())
                            <li class=@yield('create_role')><a href="{{route('role.create')}}">Create Role</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
