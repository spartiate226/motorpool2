@extends('layouts.app')

@section('sidebare')
    <ul class="nav nav-second-level">
        <li>
           <a class="active" href="{{url('new_request')}}">New request</a>
        </li>
        <li>
           <a href="{{url('request_list/'.Auth::User()->id)}}">Request history</a>
        </li>
    </ul>
@endsection

@section('content')

@endsection