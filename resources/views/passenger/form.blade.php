@extends('passenger.dashboard')

@section('content')
    <h3>Send a new request</h3>
    <form action="{{url('new_request')}}" method="post" id="mt-form">
        @csrf
        <input type="text" hidden class="" value="{{Auth::User()->id}}" name="passenger_id">
        <div class="row mb-4">
            <label>Pickup date:</label>
            <input type="date" class="form-control" name="p_date">
        </div><br>
        <div class="row mb-4">
            <label>Pickup time:</label>
            <input type="time" class="form-control" name="p_time">
        </div><br>
        <div class="row mb-4">
            <label>Pickup point:</label>
            <input type="text" class="form-control" name="p_point">
        </div><br>
        <div class="row mb-4">
            <label>Drop location:</label>
            <input type="text" class="form-control" name="d_location">
        </div><br>
        <div class="row mb-4">
            <label>Itinerary desc:</label>
            <input type="text" class="form-control" name="i_desc">
        </div><br>
        <br>
        <div class="row mb-4 mt-4">
            <button type="submit" class="btn btn-dark mr-3">Send</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </form>
@endsection