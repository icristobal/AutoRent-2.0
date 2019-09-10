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
            @if($datacar->isEmpty())
            <tr> 
                <td colspan="4">No Unverified Vehicles</td>
            </tr>
            @else

            @foreach($datacar as $datacar)
            <tr>
                <td>{{ $datacar->car_id }}</td>
                <td>{{ $datacar->make }} {{ $datacar->model }}</td>
                <td>{{ $datacar->driver_id }}</td>
                <td>
                    <form method="get" action="{{ route('showcar', $datacar->car_id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success float-left">
                            Edit Car
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection
