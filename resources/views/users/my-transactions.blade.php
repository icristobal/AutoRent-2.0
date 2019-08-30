@extends('layouts.l-gen')
@section('pagename', 'My Transactions')

@section('content')
<div class="container">

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
        </tr>
        @foreach($current as $transaction)
        <tr>
            <td>{{$transaction->listing_id}} - {{$transaction->listing_title}}</td>
            <td>{{$transaction->pickup_address}}</td>
            <td>{{$transaction->dropoff_address}}</td>
            <td>{{$transaction->rent_start}}</td>
            <td>{{$transaction->rent_end}}</td>
        </tr>    
        @endforeach
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
        @foreach($data as $transaction)
        <tr>
            <td>{{$transaction->listing_id}} - {{$transaction->listing_title}}</td>
            <td>{{$transaction->pickup_address}}</td>
            <td>{{$transaction->dropoff_address}}</td>
            <td>{{$transaction->rent_start}}</td>
            <td>{{$transaction->rent_end}}</td>
        </tr>    
        @endforeach
    </table>
</div>
</div>
<div class="mt-lg-5"></div>
@endsection
