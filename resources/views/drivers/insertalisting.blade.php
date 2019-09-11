@extends('layouts.l-driver')
@section('pagename', 'New Listing')

@section('ad-manage-link', 'active')

@section('content')

<div class="container">
    <h3>My Listing</h3>
    <hr>

    @if(session('success'))
    <div class="alert alert-success">
        <p>{{session('success')}}</p>
    </div>
    @endif
    <div class="card card-body">
        @if($cars == null)
        <h4 class="font-weight-bold">Register/Verify your Vehicle First!</h4>
        @else
        <form method="get" action="{{ route('insertalisting.create') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="listing_id" name="listing_id" />
            <div class="form-group">
                <label class="font-weight-bold">Listing Name</label>
                <input type="text" name="listing_title" class="form-control" id="listing_title" />
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Notes to Passenger</label>
                <textarea name="notes" class="form-control"
                    id="notes"></textarea>
            </div>
            <br />
            <div class="form-group">
                <label class="font-weight-bold">Destination Areas Covered</label>
                <select class="form-control" id="city_id" name="city_id">
                  

                    @foreach($cities as $datacities)
                    <option value="{{$datacities->city_id}}" >
                        {{$datacities->city}}</option>
                    @endforeach

                  
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Rate</label>
                <input type="text" name="rate" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Select Vehicle (Verified Only)</label>
                <select class="form-control" id="car_id" name="car_id">
                   

                    @foreach($cars as $datacars)
                    <option value="{{ $datacars->car_id }}">
                        {{ $datacars->make }} {{ $datacars->model }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Listing Image</label><br>
                <br>
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
