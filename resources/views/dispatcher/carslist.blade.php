@extends('dispatcher.dashboard')

@section('dispatcher_content')
    <div>
        <form action="{{url('cars/list')}}" method="post" style="margin-bottom: 1%;">
            @csrf
            <select name="carfilter" class="">
                <option value="*">All</option>
                <option value=">=">Km>=100,000km</option>
                <option value="<">Km<100,000km</option>
            </select>
            <button class="btn btn-outline-light"  type="submit">Filter</button>
        </form>
    </div>
    <table class="table table-bordered table-striped table-hover table-light">
        <thead>
         <th>Nº</th>
         <th>brand</th>
         <th>model</th>
         <th>color</th>
         <th>actual_km</th>
         <th>year</th>
         <th>status</th>
         <th>option</th>
        </thead>
        <tbody>
        @foreach($Vehicles as $Vehicle)
            <tr>
                <td>{{$Vehicle->id}}</td>
                <td>{{$Vehicle->brand}}</td>
                <td>{{$Vehicle->model}}</td>
                <td>{{$Vehicle->color}}</td>
                <td>{{$Vehicle->actual_km}}Km</td>
                <td>{{$Vehicle->year}}</td>
                <td>
                    <b>{{$Vehicle->status}}</b>
                </td>
                <td>
                    <a href="{{url('cars/add/'.$Vehicle->id)}}" class="badge bg-success">Manage status</a>
                    <a href="{{url('cars/delete/'.$Vehicle->id)}}" class="badge bg-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
