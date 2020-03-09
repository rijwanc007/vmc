<!DOCTYPE html>
<html lang="en">
<head>
    @include('./include/header')
</head>
<body>
@include('./include/main_nav_bar')
<div class="page-container">
    <div class="page-content">
        @include('./include/side_bar')
        <div class="content-wrapper">
            @yield('contains')
        </div>
    </div>
</div>
{{--<div class="main_footer">--}}
{{--    <p>Creadits by <a href="#">SETCOLBD</a> </p>--}}
{{--</div>--}}
</body>
</html>
