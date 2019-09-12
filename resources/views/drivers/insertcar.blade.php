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

    <h3 class="float-left">My Car</h3>
    <br><br>
    <a href="{{ url('driver/my-cars') }}" class="btn btn-primary float-left">
        <i class="fa fa-step-backward"></i> Back</a>
    @if($datacar == null)
    @else
    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#myModal"
     @if($datacar->verification_img != null) disabled @endif>
     <i class="fa fa-check"></i> Verify My Vehicle
    </button>
    @endif
    <br>
    <hr class="w-100 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="container-box col-12">
                <form method="POST" action="{{ route('insertcar.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="car_id" @if($datacar !=null) value="{{$datacar->car_id}}" @endif hidden />
                    <div class="row">
                        <div class="form-group">
                            <label>Car Manufacturer</label>
                            <input type="text" name="make" class="form-control" @if($datacar !=null)
                                value="{{$datacar->make}}" @endif />
                            <br>
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" @if($datacar !=null)
                                value="{{$datacar->model}} " @endif />
                            <br>
                            <label>Car Type</label>
                            <select class="form-control" id="type" default="" name="type">
                                @if($datacar !=null)
                                <option value="1" @if($datacar->make == 1) selected @else @endif>Sedan</option>
                                <option value="2" @if($datacar->make == 2) selected @else @endif>AUV</option>
                                <option value="3" @if($datacar->make == 3) selected @else @endif>Van</option>
                                @else
                                <option value="1">Sedan</option>
                                <option value="2">AUV</option>
                                <option value="3">Van</option>
                                @endif
                            </select>
                            <br>
                            <label>Seat Capacity</label>
                            <input type="text" name="capacity" class="form-control" @if($datacar !=null)
                                value="{{$datacar->capacity}} " @endif />
                            <br>
                            <label>Plate Number</label>
                            <input type="text" name="plate_num" class="form-control" @if($datacar !=null)
                                value="{{$datacar->plate_number}} " @endif />
                            <br>
                            <label>Car Image</label>
                            <br>
                            <img @if($datacar !=null)
                                src="data:image/png;base64,{{ chunk_split(base64_encode($datacar->image)) }}" @endif
                                width="320" height="240" class="border border-dark">
                            <br><br>
                            <input type="file" name="image" id="image" class="form-group">
                            <br>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-primary text-white" value="Update" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Verify Your Vehicle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('verify') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="car_id" @if($datacar !=null) value="{{$datacar->car_id}}" @endif hidden />
                    <p>To avoid rejection of your verification, please take a clear photo of your 
                    vehicle's OR/CR and your Driver's License in ONE photo.</p>
                    <input type="file" name="verification_img" id="verification_img">
                    <br><br>
                    <input type="submit" name="send" class="btn btn-primary text-white" value="Verify" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="mt-lg-5"></div>
@endsection
