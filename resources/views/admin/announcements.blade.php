@extends('layouts.l-admin')
@section('pagename', 'Announcements')

@section('announcements-link', 'active')

@section('content')
<div class="container">
        <h3>Add Announcements</h3>
        <hr>
        <div class="col-md-12">
            <div class="card card-body">
                <form method="POST" action="{{ route('announcements.store') }}">
                @csrf
                <label>Announcement Title</label>
                <input type="text" class="form-control" id="title" name="title">
                <br>
                <label>Announcement Text</label>
                <input type="textarea" class="form-control w-100" id="announcement" name="announcement">
                <br>
                <label>Target User</label>
                <select id="user" name="user" class="custom-select">
                    <option value="1">User</option>
                    <option value="2">Driver</option>
                </select>
                <br><br>
                <input type="submit" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>
</div>
<div class="mt-lg-5"></div>
@endsection
