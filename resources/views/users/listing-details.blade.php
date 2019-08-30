@extends('layouts.l-gen')
@extends('layouts.partials-usr.head-jqdtp') <!--Jquery datetime picker cdns-->
@section('content')
@section('pagename', 'Listing Details')

<div class="container">
    <h2>{{$data->listing_title}}</h2>
    <hr>
    <div class="float-left w-50">
        <div class="card card-header font-weight-bold">Driver Details</div>
        <div class="card card-body">
            <div class="container-fluid">
                <label class="font-weight-bold">Driver Name</label>
                <br>
                <label>{{$data->name}}</label>
                <br>
                <label class="font-weight-bold">Contact #</label>
                <br>
                <label>{{$data->contact_number}}</label>
                <br>
                <label class="font-weight-bold">E-Mail Address</label>
                <br>
                <label>{{$data->email}}</label>
            </div>
        </div>
    </div>
    <div class="float-right w-50">
        <div class="card card-header font-weight-bold">Car Details</div>
        <div class="card card-body">
            <div class="form-group">
                <label class="font-weight-bold">Vehicle</label>
                <br>
                <label>{{$data->make}} {{$data->model}}</label>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Car Capacity (Excluding Driver)</label>
                <br>
                <label>{{$data->capacity}}</label>
            </div>
            <img src="data:image/png;base64,{{ chunk_split(base64_encode($data->listing_image)) }}" width="300" height="245" class="ml-lg-5">
        </div>
    </div>
    <div class="float-left w-50">
        <div class="card card-header font-weight-bold">Listing Details</div>
        <div class="card card-body">
            <div class="container-fluid">
                <label class="font-weight-bold">Rate</label>
                <br>
                <label>PHP {{$data->rate}}</label>
                <br>
                <label class="font-weight-bold">Notes to Passenger</label>
                <br>
                <label>{{$data->notes}}</label>
            </div>
        </div>
    </div>
    <div class="float-left w-100">
        <div class="card card-header font-weight-bold">Book Me</div>
        <div class="card card-body">
            <div class="form-group">
                <div class="container-fluid">
                    <div class="form-group">
                        <label>Rate</label>
                        <br>
                        <label>PHP {{$data->rate}}</label>
                    </div>
                    <div class="form-group">
                        <label>Service Charge</label>
                        <br>
                        <label>PHP {{$service_charge['service_total']}}</label>
                    </div>
                    @if($existTxn == null)
                    <div class="alert-danger p-3">You cannot reserve this listing since you have a pending reservation.</div>
                    @else
                    <form method="post" action= "{{ route('findcar.store') }}">
                    @csrf
                    <input name="listing_id" id="listing_id" value="{{$data->listing_id}}" hidden>
                    <div class="form-group">
                        <label>Pick-Up Address</label>
                        <br>
                        <input class="form-control" name="pick_up" id="pick_up">
                    </div>
                    <div class="form-group">
                        <label>Drop-Off Address</label>
                        <br>
                        <input class="form-control" name="drop_off" id="drop_off">
                    </div>
                    <div class="form-group">
                        <label>Date Start</label>
                        <br>
                        <input class="datepicker form-control" name="rent_start" id="rent_start">
                    </div>
                    <div class="form-group">
                        <label>Date End</label>
                        <br>
                        <input class="datepicker form-control" name="rent_end" id="rent_end">
                    </div>
                    <input type="submit" name="send" class="btn btn-primary" value="Send" />
                </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-lg-5"></div>

<script src="{{ URL::asset('js/datepicker.js') }}">


</script>   
@endsection
