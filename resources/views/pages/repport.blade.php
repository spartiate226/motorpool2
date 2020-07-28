@extends('dispatcher.dashboard')

@section('dispatcher_content')
    <form action="{{url('repport/update')}}" method="post">
        @csrf
        <input type="text" hidden name="trip_request_id" value="{{$request_id}}">

        <div class="form-group">
            <label>Arrive km</label>
            <input type="number" class="form-control" name="arriv_km">
        </div>
        <div class="form-group">
            <label>Repport date</label>
            <input type="date" class="form-control" name="repport_date">
        </div>
        <div class="form-group">
            <label>Repport time</label>
            <input type="time" class="form-control" name="repport_time">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <button class="btn btn-info" type="submit">Submit</button>
    </form>
@endsection
