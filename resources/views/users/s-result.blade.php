@extends('layouts.l-gen')
@section('content')

<div class="container">
    <h1 class="h1 float-left">Search Results</h1>
    <br><br>
    <hr>
    <div class="card-group">
        @foreach($data as $posted)
        <div class="card">
            <div class="card-body">
                <img src="..." class="card-img-top" alt="...">
                <input type="hidden" id="listing_id" name="listing_id" value="{{$posted->listing_id}}">
                <h2 class="card-title">{{$posted->listing_title}} by {{$posted->name}} </h5>
                <h4 class="card-text">PHP {{$posted->rate}}</h3>
                <p class="card-text">{{$posted->notes}}</p>
                <a href="{{ route('cardetails', $posted->listing_id) }}">View</a>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
  <div class="mt-lg-5"></div>
@endsection