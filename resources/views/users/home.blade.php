@extends('layouts.l-gen')
@section('pagename', 'Home')
@section('home-active', 'active')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">Announcements</div>
            <div class="card-body">
                @foreach($announcements as $ann)
                <div class="card card-body">
                    <h4>{{$ann->title}}</h4>
                    <p>{{$ann->created_at}}</p>
                    <hr>
                    <p>{{$ann->announcement}}</p>
                </div>
                @endforeach
            </div>
        </div>
</div>
@endsection
