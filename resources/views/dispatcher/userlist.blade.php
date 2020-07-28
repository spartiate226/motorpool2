@extends('dispatcher.dashboard')

@section('dispatcher_content')
    <div>
        <form action="{{url('userlist')}}" method="post" style="margin-bottom: 1%;">
            @csrf
            <select name="role" class="">
                <option value="*">All</option>
                <option value="2">Dispatchers</option>
                <option value="1">Drivers</option>
                <option value="0">Passengers</option>
            </select>
            <button class="btn btn-outline-light"  type="submit">Filter</button>
        </form>
    </div>
    <table class="table table-bordered table-striped table-hover table-light">
        <thead>
        <th>Nº</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Username</th>
        <th>Mobile phone</th>
        <th>Role</th>
        <th>Email</th>
        <th>Status</th>
        <th>option</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->mobile_phone}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->Role($user->role)}}</td>
                <td>{{$user->email}}</td>
                @if($user->role==1)
                <td>
                    {{$user->Driver->status}}
                </td>
                @else
                    <td>
                      Undifined
                    </td>
                @endif
                <td>
                    <a href="{{url('regist/'.$user->Role($user->role).'/'.$user->id)}}" class="badge bg-success">Update</a>
                    <a href="{{url('user/delete/'.$user->id)}}" class="badge bg-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

