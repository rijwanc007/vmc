<div class="navbar navbar-inverse main_navbar">
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('picture/_VMC.png')}}" class="vmc_logo" alt="vmc_logo"/>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('employee_images/'.Auth::user()->image)}}" alt="">
                    <span>{{Auth::user()->name}}</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</div>
