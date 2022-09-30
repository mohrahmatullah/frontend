@extends('layouts.app')
@section('title', 'lihat')
@section('content')
<div class="wrapper">
	<h1 style="text-align: center;">Lihat List</h1>
	<ol class="list-group list-group-numbered">
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Fullname</div>
	      {{$data['fullname']}}
	    </div>
	  </li>
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Email address</div>
	      {{$data['email']}}
	    </div>
	  </li>
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Gender</div>
	      {{ $data['gender'] == 1 ? 'Pria' : 'Wanita'}}
	    </div>
	  </li>
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Date of Birth</div>
	      {{date('d-m-Y',strtotime($data['dob']))}}
	    </div>
	  </li>
	</ol>
</div>
@endsection