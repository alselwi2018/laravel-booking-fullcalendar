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
<div class="d-flex justify-content-center" >
    
    <div class="card  " style="width: 920px; background-color: rgba(0,0,255,.1)">
        <div class="card-body">
            <div class=" d-flex justify-content-center">
          <h5 class="card-title">Add Driver</h5>
            </div>
          <form method="POST" action="{{ route('driver/store') }}">
            @csrf
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
              </div>
              <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group row">
                <label for="license_number" class="col-sm-3 col-form-label">License Number</label>
                <div class="col-sm-10">
                  <input type="text" name="license_number" class="form-control" placeholder="License Number">
                </div>
              </div>
              <div class="form-group row">
                <label for="license_class" class="col-sm-3 col-form-label">License Class</label>
                <div class="col-sm-10">
                  <input type="text" name="license_class" class="form-control" placeholder="License Class">
                </div>
              </div>
              <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
@endsection