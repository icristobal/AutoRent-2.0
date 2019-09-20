@extends('layouts.l-admin')
@section('pagename', 'User Management')

@section('usrm-link', 'active')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <h3 class="float-left">User Management</h3>
    <div class="float-right"><a class="btn btn-primary" href="{{ route('user-management.create') }}"><i
                class="fa fa-plus disabled" )></i> Add User</a></div>
    <br>
    <hr class="w-100">
    <div>

    <div class="card card-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold">ID</td>
                <td class="font-weight-bold">Name</td>
                <td class="font-weight-bold">Email</td>
                <td class="font-weight-bold">Address</td>
                <td class="font-weight-bold">Contact Number</td>
                <td class="font-weight-bold">Action</td>
            </tr>
            @if($accountlist->isEmpty())
            <tr>
                <td colspan='5'>No Listings.</td>
            </tr>
            @else
            @foreach($accountlist as $Accountlist)

            <tr>
                <td> {{ $Accountlist->id }} </td>
                <td> {{ $Accountlist->name }} </td>
                <td> {{ $Accountlist->email }} </td>
                <td> {{ $Accountlist->address }} </td>
                <td> {{ $Accountlist->contact_number }} </td>
                <td>
                    <div class="btn-group" role="group">
                        <form method="get" action="{{ route('user-management.show', $Accountlist->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Edit
                            </button>
                        </form>
                        <form method="delete" action="{{ route('user-management.destroy', $Accountlist->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger delete">
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

             



</div>

<div class="mt-lg-5"></div>

@endsection
