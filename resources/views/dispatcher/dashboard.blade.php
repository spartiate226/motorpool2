@extends('layouts.app')
@section('sidebare')
    <ul class="nav" id="side-menu">

        <li>
            <a href="#"><i class="fa "></i>Requests<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('dispatcher_dashboad/ongoin')}}">Pending</a>
                </li>
                <li>
                    <a href="{{url('history/Approved')}}">Approved</a>
                </li>
                <li>
                    <a href="{{url('history/Completed')}}">Completed</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>



        <li>
            <a href="#"><i class="fa fa-users"></i>Users<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('regist/Passenger')}}">Add Passenger</a>
                </li>
                <li>
                    <a href="{{url('regist/Driver')}}">Add Driver</a>
                </li>
                <li>
                    <a href="{{url('regist/Dispatcher')}}">Add Dispatcher</a>
                </li>
                <li>
                    <a href="{{url('userlist')}}">Users list</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>


        <li>
            <a href="#"><i class="fa fa-car"></i>Cars<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('cars/add')}}">Add Car</a>
                </li>
                <li>
                    <a href="{{url('cars/list')}}">Cars List</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
    </ul>
@endsection
@section('content')
@yield('dispatcher_content')
@endsection

