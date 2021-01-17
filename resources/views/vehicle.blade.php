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
          <h5 class="card-title">Register Vehicle</h5>
            </div>
          <form method="POST" action="{{ route('vehicle/store') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">Vehicle Type</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="bus">
                <label class="form-check-label" for="inlineRadio1">Bus</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="car">
                <label class="form-check-label" for="inlineRadio2">Car</label>
              </div>
             
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Vehicle Registration</label>
                <div class="col-sm-10">
                  <input type="text" name="registration" class="form-control" placeholder="Vehicle Registration">
                </div>
              </div>
              <label for="exampleInputPassword1" class="col-sm-3">Vehicle Class License</label>
            <div class="form-check form-check-inline">
                
                <input class="form-check-input" type="radio" name="class" id="inlineRadio1" value="B">
                <label class="form-check-label" for="inlineRadio1">B</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="class" id="inlineRadio2" value="B1">
                <label class="form-check-label" for="inlineRadio2">B1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="class" id="inlineRadio3" value="D">
                <label class="form-check-label" for="inlineRadio3">D</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="class" id="inlineRadio3" value="D1">
                <label class="form-check-label" for="inlineRadio3">D1</label>
              </div>
              <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
@endsection