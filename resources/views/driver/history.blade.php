@extends('driver.dashboard')

@section('driver_content')
    <table class="table table-bordered table-striped table-hover table-light">

        <thead>
        <th>Request Nº</th>
        <th>Author</th>
        <th>Pickup date </th>
        <th>Pickup time</th>
        <th>Pickup point</th>
        <th>Drop location</th>
        <th>Itinerary description</th>
        <th>Driver</th>
        <th>Vehicle</th>
        </thead>
        <tbody>

        @foreach($trip_request as $request)
            <tr>
                <td><h5>{{$request->id}}</h5></td>
                <td>{{$request->User->first_name." ".$request->User->last_name}}</td>
                <td>{{$request->pickup_date}}</td>
                <td>{{$request->pickup_time}}</td>
                <td>{{$request->pickup_point}}</td>
                <td>{{$request->drop_location}}</td>
                <td>{{$request->itinerary_desc}}</td>
                <td>{{$request->Driver->User->last_name}}</td>
                <td>{{$request->Vehicle->brand." ".$request->Vehicle->model}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center"><div>{{$trip_request->links()}}</div></div>
@endsection

