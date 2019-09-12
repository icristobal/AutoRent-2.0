@extends('layouts.l-driver')
@section('pagename', 'My Listing')

@section('ad-manage-link', 'active')

@section('content')

<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        <p>{{session('success')}}</p>
    </div>
    @endif

    <h3 class="float-left">My Listing</h3>
    <a href="{{ url('driver/my-listings') }}" class="btn btn-primary float-right">
        <i class="fa fa-step-backward"></i> Back</a>
    <br><br>
    <hr>

    <div class="card card-body">
        @if($cars->isEmpty())
        <div class="alert-danger p-3 w-50">
        <h4 class="font-weight-bold text-danger">No Available Vehicles to Register!</h4>
        <p>Possible Reasons:</p>
        <ol>
            <li>No registered Vehicle.</li>
            <li>Vehicle used in other listings</li>
        </ol>
        </div>
        @else
        <form method="post" action="{{ route('insertlist.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="listing_id" name="listing_id" @if($listings !=null)
                value="{{$listings->listing_id}}" @endif />
            <div class="form-group">
                <label class="font-weight-bold">Listing Name</label>
                <input type="text" name="listing_title" class="form-control" @if($listings !=null)
                    value="{{$listings->listing_title}}" id="listing_title" @endif />
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Notes to Passenger</label>
                <textarea name="notes" class="form-control"
                    id="notes">@if($listings != null) {{$listings->notes}} @endif</textarea>
            </div>
            <br />
            <div class="form-group">
                <label class="font-weight-bold">Destination Areas Covered</label>
                <select class="form-control" id="city_id" name="city_id">
                    @if($listings != null)

                    @foreach($cities as $datacities)
                    <option value="{{$datacities->city_id}}" @if($datacities->city_id == $listings->city_id) selected
                        @endif>
                        {{$datacities->city}}</option>
                    @endforeach

                    @else

                    @foreach($cities as $datacities)
                    <option value="{{$datacities->city_id}}">
                        {{$datacities->city}}</option>
                    @endforeach

                    @endif
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Rate</label>
                <input type="text" name="rate" class="form-control" @if($listings !=null) value="{{$listings->rate}}"
                    @endif />
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Select Vehicle (Verified/Not used on other Listings Only)</label>
                <select class="form-control" id="car_id" name="car_id">
                    @if($listings != null)

                    @foreach($cars as $datacars)
                    <option value="{{ $datacars->car_id}}" @if($datacars->car_id == $listings->car_id) selected @endif>
                        {{ $datacars->make }} {{ $datacars->model }}</option>
                    @endforeach

                    @else

                    @foreach($cars as $datacars)
                    <option value="{{ $datacars->car_id }}">
                        {{ $datacars->make }} {{ $datacars->model }}</option>
                    @endforeach

                    @endif
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Listing Image</label><br>
                <br>
                <img @if($listings !=null)
                    src="data:image/png;base64,{{ chunk_split(base64_encode($listings->listing_image)) }}" @endif
                    width="300" height="200">
                <br><br>
                <input type="file" name="image" id="image" class="form-group">
            </div>
            <div class="form-group" align="center">
                <input type="submit" name="send" class="btn btn-primary text-white" value="Send" />
            </div>
        </form>
        @endif
    </div>
</div>

<div class="mt-lg-5"></div>

@endsection
