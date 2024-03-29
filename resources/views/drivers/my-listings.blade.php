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
    <div class="float-right"><a class="btn btn-primary" href="{{ url('/driver/insertlist') }}"><i
                class="fa fa-plus disabled" )></i> Add New Listing</a></div>
    <br>
    <hr class="w-100">
    <div class="card card-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold">ID</td>
                <td class="font-weight-bold">Listing Title</td>
                <td class="font-weight-bold">Rate</td>
                <td class="font-weight-bold">Assigned Car</td>
                <td class="font-weight-bold">Action</td>
            </tr>
            @if($Listinglist->isEmpty())
            <tr>
                <td colspan='5'>No Listings.</td>
            </tr>
            @else
            @foreach($Listinglist as $listingList)
            <tr>
                <td> {{ $listingList->listing_id }} </td>
                <td> {{ $listingList->listing_title }} </td>
                <td> PHP {{ $listingList->rate }} </td>
                <td> [{{ $listingList->car_id }}] {{ $listingList->make }} {{ $listingList->model }} </td>

                <td>
                    <div class="btn-group" role="group">
                        <form method="get" action="{{ route('showlist', $listingList->listing_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Edit
                            </button>
                        </form>

                        <form method="post" action="{{ route('deletelist', $listingList->listing_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger float-right m-auto delete">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
<div class="mt-lg-5"></div>
@endsection
