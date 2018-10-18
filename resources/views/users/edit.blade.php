@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('users.update',$user->id)}}" method="POST" role="form">
	@csrf
	<legend>Form title</legend>
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" id="" name="name" autocomplete="off" placeholder="Nhap Name" value="{{$user->name}}">
		@if ($errors->has('name'))
			<p style="color: red;">{{$errors->first('name')}}</p>
		@endif
	</div>

	@foreach($roles as $role)
		<input type="checkbox" style="margin-left: 15px;" name="role[]" value="{{$role->id}}"> {{$role->type}}
	@endforeach
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" class="form-control" id="" name="email" autocomplete="off" placeholder="Nhap Email" value="{{$user->email}}">
		@if ($errors->has('email'))
			<p style="color: red;">{{$errors->first('email')}}</p>
		@endif
	</div>
	<div class="form-group">
		<label for="">PassWord</label>
		<input type="password" class="form-control" id="" name="password" autocomplete="off" placeholder="Password" value="{{$user->password}}">
		@if ($errors->has('password'))
			<p style="color: red;">{{$errors->first('password')}}</p>
		@endif
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection