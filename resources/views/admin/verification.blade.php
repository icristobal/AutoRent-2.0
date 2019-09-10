@extends('layouts.l-admin')
@section('pagename', 'Verification')
@section('verification-link', 'active')

@section('content')
<div class="container">
    <h3>Verify Driver Vehicles</h3>
    <hr>
    <div class="card card-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold">ID</td>
                <td class="font-weight-bold">Vehicle</td>
                <td class="font-weight-bold">Owner</td>
                <td class="font-weight-bold">Action</td>
            </tr>
            @foreach($datacar as $datacar)
            <tr>
                <td>{{ $datacar->car_id }}</td>
                <td>{{ $datacar->make }} {{ $datacar->model }}</td>
                <td>{{ $datacar->driver_id }}</td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
