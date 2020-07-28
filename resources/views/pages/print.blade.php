@extends('dispatcher.dashboard')
@section('dispatcher_content')
    <div id="printer">
       
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
                <tr>
                    <td><h5>{{$request->id}}</h5></td>
                    <td>{{$request->User->first_name." ".$request->User->last_name}}</td>
                    <td>{{$request->pickup_date}}</td>
                    <td>{{$request->pickup_time}}</td>
                    <td>{{$request->pickup_point}}</td>
                    <td>{{$request->drop_location}}</td>
                    <td>{{$request->itinerary_desc}}</td>
                    <td>{{$request->Driver->User->first_name." ".$request->Driver->User->last_name}}</td>
                    <td>{{$request->Vehicle->brand." ".$request->Vehicle->model}}</td>
                </tr>
            </tbody>
        </table>

        <ul>
            <li>Depart km:{{$request->repport->deppart_km }}</li>
            <li>Arrive km:{{$request->repport->arriv_km}}</li>
            <li>Repport date:{{$request->repport->repport_date }}</li>
            <li>Repport time:{{$request->repport->repport_time }}</li>
            <li>Description:
                <p>{{$request->repport->description }}</p>
            </li>
        </ul>

    </div>
    <button class="btn btn-overlay-info" id="printbt">Print</button>
@endsection
