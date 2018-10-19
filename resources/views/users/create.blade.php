@extends('layouts.master')
@section('content')
	<div class="col-lg-12" style="padding-top: 20px;">
		<form action="{{route('users.store')}}" method="POST" role="form">
			@csrf
			<legend>Add member</legend>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="name" autocomplete="off" placeholder="Nhap Name">
				@if ($errors->has('name'))
					<p style="color: red;">{{$errors->first('name')}}</p>
				@endif
			</div>
			<label>Role</label> <br>
			@foreach($roles as $key=> $role)
				@if($key==0)
	               <input type="checkbox" style="margin-left: 15px;" name="role[]" checked value="{{$role->id}}"> {{$role->type}}
	           @endif
	           @if($key!=0)
	               <input type="checkbox" style="margin-left: 15px;" name="role[]" value="{{$role->id}}"> {{$role->type}}
	           @endif
				
			@endforeach
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" autocomplete="off" placeholder="Nhap Email">
				@if ($errors->has('email'))
					<p style="color: red;">{{$errors->first('email')}}</p>
				@endif
			</div>
			<div class="form-group">
				<label for="">PassWord</label>
				<input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
				@if ($errors->has('password'))
					<p style="color: red;">{{$errors->first('password')}}</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection