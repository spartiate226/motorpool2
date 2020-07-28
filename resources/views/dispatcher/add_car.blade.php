@if($vehicle!=null)
    $read="readonly";
@else
    $read="";
@endif
@extends('dispatcher.dashboard')
@section('dispatcher_content')

<form class="p-5" action="@if($vehicle!=null) {{url('cars/add/'.$vehicle->id)}} @else {{url('cars/add')}} @endif" method="post">
    @csrf
    <div class="form-group">
        <label>Brand</label>
        <input type="text" class="form-control" @if(isset($vehicle) && $vehicle!=null){{'value='.$vehicle->brand}}@endif  name="brand">
    </div>

    <div class="form-group">
        <label>Model</label>
        <input type="text" class="form-control" @if(isset($vehicle) && $vehicle!=null){{'value='.$vehicle->model}}@endif name="model">
    </div>

    <div class="form-group">
        <label>Color</label>
        <input type="text" class="form-control" @if(isset($vehicle) && $vehicle!=null){{'value='.$vehicle->color}}@endif name="color">
    </div>

    <div class="form-group">
        <label>Kilometers</label>
        <input type="number" class="form-control" @if(isset($vehicle) && $vehicle!=null){{'value='.$vehicle->actual_km}}@endif name="actual_km">
    </div>

    <div class="form-group">
        <label>Years</label>
        <input type="text" class="form-control" @if(isset($vehicle) && $vehicle!=null){{'value='.$vehicle->year}}@endif name="year">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="Available" @if(isset($vehicule)  && $vehicule->status=="Available"){{"selected"}}@endif>Available</option>
            <option value="Not available" @if(isset($vehicule)  && $vehicule->status=="Not available"){{"selected"}}@endif>Not available</option>
        </select>
    </div>

    <button class="btn btn-info" type="submit">Submit</button>
</form>
@endsection
