@extends('layouts.app')
@section('title', 'Create')
@section('content')
<div class="wrapper">
	<h1 style="text-align: center;">Create List</h1>
	@if(count($errors))
	    @foreach($errors->all() as $error)
	        <div class="alert alert-danger alert-dismissible mb-3 mt-3">
	            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	            {{$error}}
	        </div>
	    @endforeach
	@endif
	@if($alert_toast = Session::get('alert_toast'))
	    <div class="alert alert-{{$alert_toast['type']}} alert-dismissible mb-3 mt-3">
	        {{$alert_toast['title']}}</h4>
	        {{$alert_toast['text']}}
	    </div>
	@endif
	<div class="row">
		<form class="col-lg-6" action="{{route('create')}}" method="post">
			@csrf
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Fullname</label>
				<input type="text" class="form-control" name="fullname">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input type="email" class="form-control" name="email">
			<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
				<input type="password" class="form-control" name="password_confirmation">
			</div>
			<div class="mb-3">
				<label class="form-label">Gender</label>
				<select name="gender" class="form-select">
					<option value="1">Pria</option>
					<option value="2">Wanita</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Date of Birth</label><br>
				<input id="datepicker" type="text" class="form-control" name="dob">
			</div>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" name="agree" value="1">
				<label class="form-check-label" for="exampleCheck1">Agree</label>
			</div>			
			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection