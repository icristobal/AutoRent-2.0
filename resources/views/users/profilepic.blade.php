@extends('layouts.l-gen')
@section('pagename', 'My Profile')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3 class="float-left">Change Profile Picture</h3>
    <a class="btn btn-primary float-right" href="{{ route('dpage-show') }}">Change Profile Picture</a>
    <br>
    <hr class="w-100">
    <div class="card w-100">
        <div class="card-body">
            <form method="post" action="{{ route('updatepic') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <img @if($me != null) src="data:image/png;base64,{{ chunk_split(base64_encode($me->display_image)) }}" @endif width="300" height="200">
                        <br><br>
                        <input type="file" name="image" id="image" class="form-group">
                    </div>
                    
                <div class="form-group">
                    <input type="submit" name="send" class="btn btn-info text-white" value="Update My Profile Photo" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="mt-lg-5"></div>
@endsection
