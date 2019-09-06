@extends('layouts.l-driver')
@section('pagename', 'My Car')

@section('car-manage-link', 'active')

@section('content')

<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3>My Car</h3>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="container-box col-md-10">
                <form method="POST" action="{{ route('insertcar.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="car_id" @if($datacar != null) value="{{$datacar->car_id}}" @endif hidden/>
                    <div class="row">
                        <div class="form-group">
                            <label>Car Manufacturer</label>
                            <input type="text" name="make" class="form-control" @if($datacar != null) value="{{$datacar->make}}" @endif />
                            <br>
                            <label>Model</label>
                            <input type="text" name="model" class="form-control"@if($datacar != null)  value="{{$datacar->model}} "@endif />
                            <br>
                            <label>Car Type</label>
                            <select class="form-control" id="type" default="" name="type">
                                @if($datacar !=null)
                                <option value="1" @if($datacar->make = 1) selected @else @endif>Sedan</option>
                                <option value="2" @if($datacar->make = 2) selected @else @endif>AUV</option>
                                <option value="3" @if($datacar->make = 3) selected @else @endif>Van</option>
                                @else
                                <option value="1">Sedan</option>
                                <option value="2">AUV</option>
                                <option value="3">Van</option>
                                @endif
                            </select>
                            <br>
                            <label>Seat Capacity</label>
                            <input type="text" name="capacity" class="form-control" @if($datacar != null) value="{{$datacar->capacity}} "@endif/>
                            <br>
                            <label>Plate Number</label>
                            <input type="text" name="plate_num" class="form-control" @if($datacar != null) value="{{$datacar->plate_number}} "@endif/>
                            <br>
                            <label>Car Image</label>
                            <br>
                            <img @if($datacar != null) src="data:image/png;base64,{{ chunk_split(base64_encode($datacar->image)) }}" @endif width="300" height="200">
                            <br><br>
                            <input type="file" name="image" id="image" class="form-group">
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-info" value="Send" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="mt-lg-5"></div>
@endsection
