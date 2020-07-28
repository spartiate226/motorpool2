@extends('layouts.app')
@section('sidebare')
    <ul class="nav" id="side-menu">

        <li>
            <a href="#"><i class="fa "></i>My requests<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('DriverRequest/'.Auth::User()->Driver->id)}}">Pending</a>
                </li>
                <li>
                    <a href="{{url('DriverPending/'.Auth::User()->Driver->id)}}">Completed</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
    </ul>
@endsection
@section('content')
    @yield('driver_content')
@endsection

