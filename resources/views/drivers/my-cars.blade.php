@extends('layouts.l-driver')
@section('pagename', 'My Cars')

@section('car-manage-link', 'active')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3 class="float-left">My Cars</h3>
    <div class="float-right"><a class="btn btn-primary" href={{ url('/driver/insertcar') }}><i class="fa fa-plus"></i>
            Add Car</a></div>
    <br>
    <hr class="w-100">
    <div class="card card-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold">ID</td>
                <td class="font-weight-bold">Vehicle Name</td>
                <td class="font-weight-bold">Plate Number</td>
                <td class="font-weight-bold">Car Type</td>
                <td class="font-weight-bold">Capacity</td>
                <td class="font-weight-bold">Verification Status</td>
                <td class="font-weight-bold w-25">Action</td>
            </tr>
            @if($datacar->isEmpty())
            <tr>
                <td colspan="7">No Cars. Register one now!</td>
            </tr>
            @else
            @foreach($datacar as $datacar)
            <tr>
                <td> {{ $datacar->car_id }} </td>
                <td> {{ $datacar->make }} {{ $datacar->model }} </td>
                <td> {{ $datacar->plate_number }}</td>
                <td> {{ $datacar->type }} </td>
                <td> {{ $datacar->capacity }} seats </td>
                <td> {{ $datacar->verification_status }} </td>
                <td>
                    <div class="btn-group" role="group">
                        <form method="get" action="{{ route('viewcar', $datacar->car_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Edit Car
                            </button>
                        </form>

                        <form method="post" action="{{ route('deletecar', $datacar->car_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger float-right m-auto delete">
                                Delete Car
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
