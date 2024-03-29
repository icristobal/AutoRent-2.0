@extends('layouts.l-gen')
@section('pagename', 'My Profile')

@section('content')
<div class="container">
        <div class="float-left m-3">
                <h3>My Profile</h3>
            </div>
	<div class="text-right m-3">
        <a class="btn btn-primary" href="{{ route('changepass') }}">Change Password</a>
        <a class="btn btn-primary" href="{{ route('upage-show') }}">Change Profile Photo</a>
    </div>
    <hr>
    <div class="card">
    	@foreach($user as $me)
    	<div class="card-body">
    		<form method="get" action="{{ route('my-profile/update', $me->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('patch') }}

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$me->name}}" id="name" />
        </div>
        <div class="form-group">
            <label>Contact #</label>
            <input type="text" name="contact" class="form-control" value="{{$me->contact_number}}" id="contact">
        </div>
        <br />
        <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" value="{{$me->email}}" id="contact">
        </div>
        <br />
        @endforeach
        <div class="form-group" align="center">
            <input type="submit" name="send" class="btn btn-info" value="Update My Profile" />
        </div>
    </form>
    </div>
</div>

</div>
@endsection
