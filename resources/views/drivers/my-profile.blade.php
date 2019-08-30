@extends('layouts.l-driver')
@section('pagename', 'My Profile')

@section('content')
<div class="container">
    <div class="float-left">
        <h3>My Profile</h3>
      <br>
     

    </div>
	<div class="float-right m-3">

        <form enctype="multipart/form-data" action="{{ route('display_image') }}" method="POST">
               
                <input type="file" name="display_image">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-primary" value="Update Profile Picture">
                <a class="btn btn-primary" href="{{ route('changepass') }}">Change Password</a>
        </form>
	</div>
<br><br><br>
    <hr>
    <div class="card">
    	        @foreach($user as $me)
    	<div class="card-body">
    		<form method="put" action="{{ route('my-profile/update', $me->id) }}">
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
        <div class="form-group">
            <label>Profile Image</label><br>
            <input type="file" name="avatar" id="avatar">
        </div>
        @endforeach
        <div class="form-group" align="center">
            <input type="submit" name="send" class="btn btn-info" value="Update My Profile" />
        </div>
    </form>
    </div>
</div>

</div>
@endsection
