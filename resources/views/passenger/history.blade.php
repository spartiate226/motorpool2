@extends('passenger.dashboard')

@section('content')

    <table class="table table-bordered">

        <thead>

            <tr>
                <td>Pickup date</td>
                <td>Pickup time</td>
                <td>Pickup point</td>
                <td>Drop location</td>
                <td>Status</td>
            </tr>
        </thead>

        <tbody>
        @foreach($list_req as $req)
        <tr>
            <td>{{$req->pickup_date}}</td>
            <td>{{$req->pickup_time}}</td>
            <td>{{$req->pickup_point}}</td>
            <td>{{$req->drop_location}}</td>
            <td>{{$req->statut}}</td>
        </tr>
        @endforeach
        </tbody>

    </table>


@endsection