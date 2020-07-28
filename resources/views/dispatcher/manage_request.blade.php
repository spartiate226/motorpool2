@extends('dispatcher.dashboard')

@section('dispatcher_content')
    <form action="{{url('Manage/update')}}" method="post">
        @csrf
            <input type="text" hidden name="request_id" value="{{$trip_request}}">
        <div class="form-group">
            <label>Choose driver</label>
            <select class="form-control" name="driver_id">
                @foreach($Drivers as $Driver)
                    <option value="{{$Driver->id}}">{{$Driver->User->first_name." ".$Driver->User->last_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Choose Vehicle</label>
            <select class="form-control" name="vehicle_id">
                @foreach($Vehicles as $Vehicle)
                    <option value="{{$Vehicle->id}}">{{$Vehicle->brand." ".$Vehicle->model}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-info" type="submit">Assign</button>
    </form>
@endsection
