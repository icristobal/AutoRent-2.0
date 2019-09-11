@extends('layouts.l-driver')
@section('pagename', 'My Listings')

@section('ad-manage-link', 'active')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3 class="float-left">My Listings</h3>
    <div class="float-right"><a class="btn btn-primary" href="{{ url('/driver/insertalisting') }}"><i class="fa fa-plus"></i> Add New Listing</a></div>
    <br>
    <hr class="w-100">
    <div class="card card-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold">ID</td>
                <td class="font-weight-bold">Listing Title</td>
                <td class="font-weight-bold">Rate</td>
                <td class="font-weight-bold">Driver ID</td>
                <td class="font-weight-bold">Notes</td>
                <td class="font-weight-bold">Car Id</td>
                <td class="font-weight-bold w-25">Action</td>
            </tr>
            @foreach($Listinglist as $listingList)
            <tr>
                <td> {{ $listingList->listing_id }} </td>
                <td> {{ $listingList->listing_title }}  </td>
                <td> {{ $listingList->rate }} </td>
                <td> {{ $listingList->driver_id }} </td>
                
                <td> {{ $listingList->notes }} </td>
                <td> {{ $listingList->car_id }} </td>
                
                <td>
                   <form method="get" action="{{ url('/driver/insertlist',$listingList->car_id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success float-left">
                            Edit
                        </button>
                    </form>
                    <form method="post" action="{{ route('deletecar', $listingList->car_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger float-right m-auto">
                                Delete
                            </button>
                        </form> 
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="mt-lg-5"></div>
@endsection
