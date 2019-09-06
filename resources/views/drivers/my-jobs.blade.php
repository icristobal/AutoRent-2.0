@extends('layouts.l-driver')
@section('pagename', 'My Jobs')

@section('job-manage-link', 'active')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3>Current Job</h3>
    <hr>
    <div class="card card-body">
    <table class="table">
        <tr>
            <td class="font-weight-bold">ID</td>
            <td class="font-weight-bold w-25">Passenger</td>
            <td class="font-weight-bold w-25">Rent Start/End</td>
            <td class="font-weight-bold w-25">Pickup/Dropoff</td>
            <td class="font-weight-bold 2-25">Created</td>
            <td class="font-weight-bold w-25">Action</td>
        </tr>
        @if($cjob->isEmpty())
        <tr>
            <td colspan="7">Accept new Jobs Below.</td>
        </tr>
        @else
        @foreach($cjob as $cjob)
        <tr>
            <td>{{$cjob->txn_id}}</td>
            <td>{{$cjob->passenger_id}} - {{$cjob->name}}</td>
            <td>{{$cjob->rent_start}} -{{$cjob->rent_end}}</td>
            <td>{{$cjob->pickup_address}} - {{$cjob->dropoff_address}}</td>
            <td>{{$cjob->created_at}}</td>
            <td>
                <form method="post" action="{{ route('donetxn', $cjob->txn_id) }}">
                    @csrf
                        <button type="submit" class="btn btn-success float-left m-auto">
                            <i class="fa fa-check"></i> Done
                    </button>
                </form>
                <form method="post" action="{{ route('canceltxn', $cjob->txn_id) }}">
                    @csrf
                        <button type="submit" class="btn btn-danger float-right m-auto">
                            <i class="fa fa-times"></i> Cancel
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </table>
    </div>

    <hr>

    <h3>Pending Jobs</h3>
    <div class="card card-body">
    <table class="table">
        <tr>
            <td class="font-weight-bold">ID</td>
            <td class="font-weight-bold w-25">Passenger</td>
            <td class="font-weight-bold w-25">Rent Start/End</td>
            <td class="font-weight-bold w-25">Pickup/Dropoff</td>
            <td class="font-weight-bold 2-25">Created</td>
            <td class="font-weight-bold">Driver</td>
            <td class="font-weight-bold w-25">Action</td>
        </tr>
        @if($pjob->isEmpty())
        <tr>
            <td colspan="8">None. (Yet.)</td>
        </tr>
        @else
        @foreach($pjob as $pjob)
        <tr>
            <td>{{$pjob->txn_id}}</td>
            <td>{{$pjob->passenger_id}} - {{$pjob->name}}</td>
            <td>{{$pjob->rent_start}} -{{$pjob->rent_end}}</td>
            <td>{{$pjob->pickup_address}} - {{$pjob->dropoff_address}}</td>
            <td>{{ $pjob->created_at }}</td>
            <td>{{ $pjob->hasDriver }}</td>
            <td>
                <form method="post" action="{{ route('approvetxn', $pjob->txn_id) }}">
                    @csrf
                        <button type="submit" class="btn btn-success float-left m-auto" 
                        @if($pending!=1) disabled @else @endif>
                            <i class="fa fa-check"></i> Approve
                    </button>
                </form>
                <form method="post" action="{{ route('denytxn', $pjob->txn_id) }}">
                    @csrf
                        <button type="submit" class="btn btn-danger float-right m-auto" 
                        @if($pending !=1) disabled @else @endif>
                            <i class="fa fa-times"></i> Deny
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </table>
    </div>
</div>
<div class="mt-lg-5"></div>
@endsection
