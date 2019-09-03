@extends('layouts.l-gen')
@section('pagename', 'My Transactions')

@section('content')

<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="card card-body">
    <h3>My Transactions</h3>
    <hr>
    <h4>Current</h4>
    <table class="table">
        <tr>
            <td class="font-weight-bold">Listing</td>
            <td class="font-weight-bold">Pickup Address</td>
            <td class="font-weight-bold">Dropoff Address</td>
            <td class="font-weight-bold">Start Date/Time</td>
            <td class="font-weight-bold">End Date/Time</td>
            <td class="font-weight-bold">Cancel</td>
        </tr>
        @if($current->isEmpty())
        <tr>
            <td colspan="6">No Current Transaction</td>
        </tr>
        @else
        @foreach($current as $transaction)
        <tr>
            <td>{{$transaction->listing_id}} - {{$transaction->listing_title}}</td>
            <td>{{$transaction->pickup_address}}</td>
            <td>{{$transaction->dropoff_address}}</td>
            <td>{{$transaction->rent_start}}</td>
            <td>{{$transaction->rent_end}}</td>
            <td> 
                <form method="post" action="{{ route('canceltxn', $transaction->txn_id) }}">
                    @csrf
                        <button type="submit" class="btn btn-danger float-right m-auto">
                            <i class="fa fa-times"></i>
                    </button>
                </form>
            </td>
        </tr>    
        @endforeach
        @endif
    </table>

    <hr>

    <h4>History</h4>
    <table class="table">
        <tr>
            <td class="font-weight-bold">Listing</td>
            <td class="font-weight-bold">Pickup Address</td>
            <td class="font-weight-bold">Dropoff Address</td>
            <td class="font-weight-bold">Start Date/Time</td>
            <td class="font-weight-bold">End Date/Time</td>
        </tr>
        @if($data->isEmpty())
        <tr>
            <td colspan="6">No Transactions.</td>
        </tr>
        @else
        @foreach($data as $transaction)
        <tr>
            <td>{{$transaction->listing_id}} - {{$transaction->listing_title}}</td>
            <td>{{$transaction->pickup_address}}</td>
            <td>{{$transaction->dropoff_address}}</td>
            <td>{{$transaction->rent_start}}</td>
            <td>{{$transaction->rent_end}}</td>
        </tr>    
        @endforeach
        @endif
    </table>
</div>
</div>
<div class="mt-lg-5"></div>
@endsection
