@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{route('users.update',$user->id)}}" method="POST" role="form">
		{{csrf_field()}}
		{{ method_field('PUT') }}
		<legend>Edit User</legend>
		<div class="form-group">
			<input type="hidden" name="id" value="{{$user->id}}">
			<label for="">Name</label>
			<input type="text" class="form-control" id="" name="name" autocomplete="off" placeholder="Nhap Name" value="{{$user->name}}">
			@if ($errors->has('name'))
				<p style="color: red;">{{$errors->first('name')}}</p>
			@endif
		</div>

		@foreach($roles as $role)
			@if(in_array($role->type, $array))
				<input checked="" type="checkbox" style="margin-left: 15px;" name="role[]" value="{{$role->id}}"> {{$role->type}}
			@endif
			@if(!in_array($role->type, $array))
				<input  type="checkbox" style="margin-left: 15px;" name="role[]" value="{{$role->id}}"> {{$role->type}}
			@endif
		@endforeach
		<div class="form-group">
			<label for="">Email</label>
			<input type="text" class="form-control" id="" name="email" autocomplete="off" placeholder="Nhap Email" value="{{$user->email}}">
			@if ($errors->has('email'))
				<p style="color: red;">{{$errors->first('email')}}</p>
			@endif
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@endsection