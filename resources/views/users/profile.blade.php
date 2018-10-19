@extends('layouts.master')
@section('content')
<div class = "col-md-12">
	<div class="col-md-8 col-md-offset-2">
		<center><h1>Edit Profile</h1></center>
		<div class="profile-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light ">
						<div class="portlet-title tabbable-line">
						
						</div>
						<div class="portlet-body">
						<div class="tab-content">
						<div class="tab-pane active" id="edit-information">
						<div class="row">
						<div class="portlet light bordered">
						<div class="portlet-body">
						<div class="card">
						<div class="content">
						@if(session()->has('flag_edit'))
						<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						{{session()->get('flag_edit')}}
						</div>
						@endif
						<form id="edit-profile" name="edit-profile" role="form" method="post" action="{{route('user.editinfor',$user->id)}}">
						@csrf
						{{method_field('put')}}

						<input type="hidden" name="password" value="{{$user->password}}">

						<div class="row">
						<div class="col-md-12">
						<div class="form-group">
						<label>Name <span style="color: red;">*</span></label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}" required="">
						</div>
						</div>

						<div class="col-md-12">
						<div class="form-group">
						<label>Email <span style="color: red;">*</span></label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Name" value="{{$user->email}}" required="">
						</div>
						</div>
						</div>

						<button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
						<div class="clearfix"></div>
						</form>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END PROFILE CONTENT -->
</div>
@endsection