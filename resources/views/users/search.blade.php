@extends('layouts.l-gen')
@section('content')
    <div class="container">
          <h1>Search Car</h1>
          <hr>
<form action="{{ route('s-result') }}" method="get" role="search">
    @csrf

    	<div class="card card-body">
            Car Type: <select type ="text" class = form-control name="r">
              <option selected hidden> </option>  
              <option value = "1">Sedan</option>
              <option value = "2">AUV</option>
              <option value = "3">Van</option>
            </select>

            Destination: <select class = form-control name ="q">

                <option selected hidden> </option>
                                @foreach($data as $posted)
                <option>{{$posted->city}}</option>
                             @endforeach
            </select>
  <br>
            <button type="submit" class="btn btn-primary btn-block">
    		Search           
            </button>
        </span>
    </div>
   
    </div>
    

</form>
@endsection