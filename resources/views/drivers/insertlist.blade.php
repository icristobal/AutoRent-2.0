@extends('layouts.l-driver')
@section('pagename', 'My Car')

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
        <h4 class="font-weight-bold">Register your Vehicle First!</h4>
        @else
        <form method="post" action="{{ route('insertlist.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="listing_id" @if($listings != null) value="{{$listings->listing_id}}" @endif />
            <div class="form-group">
                <label>Listing Name</label>
                <input type="text" name="listing_title" class="form-control" @if($listings != null) value="{{$listings->listing_title}}" id="listing_title" @endif />
            </div>
            <div class="form-group">
                <label>Notes to Passenger</label>
                <textarea name="notes" class="form-control" id="notes">@if($listings != null) {{$listings->notes}} @endif</textarea>
            </div>
            <br />
            <div class="form-group">
                <label>Destination Areas Covered</label>
                <select class="form-control" id="city_id" name="city_id">
                    @if($listings != null)

                    @foreach($cities as $datacities)
                    <option value="{{$datacities->city_id}}" 
                        @if($datacities->city_id == $listings->city_id) selected @endif>
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
                <label>Rate</label>
                <input type="text" name="rate" class="form-control" @if($listings != null) value="{{$listings->rate}}" @endif />
            </div>
            <div class="form-group">
                <label>Listing Image</label><br>
                <br>
                <img @if($listings != null) src="data:image/png;base64,{{ chunk_split(base64_encode($listings->listing_image)) }}" @endif width="300" height="200">
                <br><br>
                <input type="file" name="image" id="image" class="form-group">
            </div>
            <div class="form-group" align="center">
                <input type="submit" name="send" class="btn btn-info" value="Send" />
            </div>
        </form>
        @endif
    </div>
</div>

<div class="mt-lg-5"></div>

@endsection
