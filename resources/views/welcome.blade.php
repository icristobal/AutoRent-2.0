@extends('layouts.l-gen')
@section('pagename', 'Home')
@section('home', 'active')

<div class="contr">
	<div class="mask">
		<img class="img-fluid w-100 h-auto" src="https://www.bworldonline.com/wp-content/uploads/2019/04/Toyota-Vios-1-042219.jpg">
	</div>
	<div class="centered font-weight-bold">Want to go somewhere? We got you covered.<br>
		<a class="wc-btn btn-primary text-white" href={{ url('/findcar') }}>Browse Vehicles</a>
	</div>
</div>