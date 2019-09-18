@extends('layouts.l-admin')
@section('pagename', 'Verification')
@section('verification-link', 'active')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3 class="float-left">Verify Driver Vehicles</h3>
    <a href="{{ url('admin/verification') }}" class="btn btn-primary float-right">
        <i class="fa fa-step-backward"></i> Back</a>
    <br><br>
    <hr>
    <div class="card card-body">
        <div class="parent-container d-flex">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @csrf
                        <input type="text" name="car_id" value="{{$datacar->car_id}}" hidden />
                        <label>Car Manufacturer</label>
                        <input type="text" name="make" class="form-control" value="{{$datacar->make}}" readonly />
                        <br>
                        <label>Model</label>
                        <input type="text" name="model" class="form-control" value="{{$datacar->model}}" readonly />
                        <br>
                        <label>Car Type</label>
                        <select class="form-control" id="type" default="" name="type" readonly>
                            <option value="1" @if($datacar->type == 1) selected @endif>Sedan</option>
                            <option value="2" @if($datacar->type == 2) selected @endif>AUV</option>
                            <option value="3" @if($datacar->type == 3) selected @endif>Van</option>
                        </select>
                        <br>
                        <label>Seat Capacity</label>
                        <input type="text" name="capacity" class="form-control" value="{{$datacar->capacity}}"
                            readonly />
                        <br>
                        <label>Plate Number</label>
                        <input type="text" name="plate_num" class="form-control" value="{{$datacar->plate_number}}"
                            readonly />
                        <br>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <label>Car Image</label>
                        <img @if($datacar->image != null)
                        src="data:image/png;base64,{{ chunk_split(base64_encode($datacar->image)) }}"
                        @else @endif
                        width="350" height="250">
                        <br><br>
                        <label>Verification Image:</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#myModal">View</button>
                        <br><br>
                        @if($datacar->verification_status != 1)
                        <div class="btn-group" role="group">
                            <label>Actions:</label>
                            <form method="POST" action="{{ route('approveVerify', $datacar->car_id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Approve Verification Application
                                </button>
                            </form>

                            <form method="POST" action="{{ route('approveVerify', $datacar->car_id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Reject Verifcation Application
                                </button>
                            </form>
                            @else
                            <p class="alert-success"><i class="fa fa-check-circle m-3"></i> Vehicle is Verified</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade mw-100 w-100" id="myModal" role="dialog">
            <div class="modal-dialog w-100">

                <!-- Modal content-->
                <div class="modal-content w-100">
                    <div class="modal-header w-100">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <img @if($datacar->verification_img != null)
                        src="data:image/png;base64,{{ chunk_split(base64_encode($datacar->verification_img)) }}"
                        @else @endif class="mw-100 mh-100">
                        <p>Right-click, open in new tab for clearer image.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-lg-5"></div>
        @endsection
