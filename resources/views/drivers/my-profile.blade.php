@extends('layouts.l-driver')
@section('pagename', 'My Profile')

@section('content')
<div class="container">
    <h3 class="float-left">My Profile</h3>
    <a class="btn btn-primary float-right" href="{{ route('dpage-show') }}">Change Profile Picture</a>
    <br>
    <hr class="w-100">
    <div class="card w-100">
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
                @endforeach
                <div class="form-group">
                    <input type="submit" name="send" class="btn btn-info text-white" value="Update My Profile" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="mt-lg-5"></div>
@endsection
