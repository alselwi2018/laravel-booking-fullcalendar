@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="d-flex justify-content-center">
    <div class="card" style="width: 920px; background-color: rgba(0,0,255,.1)">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <h5 class="card-title">Book a Vehicle</h5>
            </div>
            <form method="POST" action="{{ route('hire/store') }}">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control" placeholder="Booking title">
                      @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="start" class="col-sm-3 col-form-label" >Start Date</label>
                    <div class="col-sm-10">
                      <input type="text" name="start" value="{{ old('start') }}" class="@error('start') is-invalid @enderror form-control datepicker"  placeholder="Start Date">
                      @error('start')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="end" class="col-sm-3 col-form-label">End Date</label>
                    <div class="col-sm-10">
                      <input type="text" name="end" value="{{ old('end') }}" class="@error('end') is-invalid @enderror form-control datepicker"  placeholder="End Date">
                      @error('end')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="driver_id" class="col-sm-3 col-form-label">Driver ID</label>
                    <div class="col-sm-10">
                      <input type="text" name="driver_id" value="{{ old('driver_id') }}" class="@error('driver_id') is-invalid @enderror form-control" placeholder="Driver ID">
                      @error('driver_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  <label for="exampleInputPassword1" class="col-sm-3">Vehicle Type</label>
                <div class="form-check form-check-inline">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="vehicle" id="inlineRadio3" value="Car">
                    <label class="form-check-label" for="inlineRadio3">Car</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="vehicle"  id="inlineRadio3" value="Bus">
                    <label class="form-check-label" for="inlineRadio3">Bus</label>
                  </div>
                  @error('vehicle')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                  <div class="form-group row">
                    <label for="vehicle_id" class="col-sm-3 col-form-label">vehicle ID</label>
                    <div class="col-sm-10">
                      <input type="text" name="vehicle_id" value="{{ old('vehcile_id') }}" class="@error('vehicle_id') is-invalid @enderror form-control" placeholder="Vehicle ID">
                      @error('vehicle_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <br>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection