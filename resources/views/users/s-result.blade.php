@extends('layouts.l-gen')
@section('content')
@section('pagename', 'Search Results')

<div class="container">
    <h1 class="h1 float-left">Search Results</h1>
    <br><br>
    <hr>
    <div class="card-group">
            @foreach($data as $posted)
            <div class="card">
                <div class="card-body">
                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($posted->listing_image)) }}" width="300" height="245">
                    <hr>
                    <input type="hidden" id="listing_id" name="listing_id" value="{{$posted->listing_id}}">
                    <h2 class="card-title">{{$posted->listing_title}}</h5>
                    <p class="card-text">{{$posted->name}}</p>
                    <h4 class="card-text">PHP {{$posted->rate}}</h3>
                    <p class="card-text">{{$posted->notes}}</p>
                    <a href="{{ route('cardetails', $posted->listing_id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
            @endforeach
    </div>
</div>
  <div class="mt-lg-5"></div>
@endsection