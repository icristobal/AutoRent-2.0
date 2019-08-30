@extends('layouts.l-driver')
@section('pagename', 'My Transactions')

@section('content')
<div class="container">
    <h3>My Transactions</h3>
    <hr>
<div class="card card-body">
    <table class="table">
        <tr>
            <td class="font-weight-bold">Listing</td>
            <td class="font-weight-bold">Pickup Address</td>
            <td class="font-weight-bold">Dropoff Address</td>
            <td class="font-weight-bold">Start Date/Time</td>
            <td class="font-weight-bold">End Date/Time</td>
            <td class="font-weight-bold">Status</td>
        </tr>
        @if($listing->isEmpty())
        <tr>
            <td colspan='7' class="align-middle">No Transactions.</td>
        @else
        @foreach($listing as $transaction)
        <tr>
            <td>{{$transaction->listing_id}} - {{$transaction->listing_title}}</td>
            <td>{{$transaction->pickup_address}}</td>
            <td>{{$transaction->dropoff_address}}</td>
            <td>{{$transaction->rent_start}}</td>
            <td>{{$transaction->rent_end}}</td>
            <td>{{$transaction->status}}</td>
        </tr>    
        @endforeach
        @endif
    </table>
</div>
</div>
<div class="mt-lg-5"></div>
@endsection
