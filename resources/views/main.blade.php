@extends('layouts.app')
@section('content')
<div class="response"></div>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li style="text-decoration: none">{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-flex justify-content-between pb-4"><a class="btn btn-secondary" href="/vehicle">Add a new Vehicle</a> <a class="btn btn-info" href="/hire">Book a new Vehicle</a> <a class="btn btn-primary pl-4" href="/driver">Add a new Driver</a></div>
<div id='calendar'></div> 
@endsection