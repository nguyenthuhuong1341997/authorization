@extends('layouts.master')
@section('content')
<div class = "col-md-12">
	<div class="col-md-8 col-md-offset-2">
		<center><h1>Change password</h1></center>
		<div class="profile-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light ">
						<div class="portlet-title tabbable-line">
						
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<div class="tab-pane active" id="change-password">
									@if(session()->has('flag'))
										<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											{{session()->get('flag')}}
										</div>
									@endif
									<form id="edit-profile-password" name="edit-profile-password" action="{{route('user.editpassword',$user->id)}}" method="post">
									@csrf
									<!-- {{ method_field('put')}} -->
										<div class="form-group">
											<label class="control-label">Current Password</label>
											<input type="password" name="current_password" class="form-control">
											@if ($errors->has('current_password'))
											<p style="color: red;">{{$errors->first('current_password')}}</p>
											@endif
										</div>
										<div class="form-group">
											<label class="control-label">New password</label>
											<input type="password" name="password" class="form-control" >
											@if ($errors->has('password'))
											<p style="color: red;">{{$errors->first('password')}}</p>
											@endif
										</div>
										<div class="form-group">
											<label class="control-label">Repeat password</label>
											<input type="password" name="password_confirmation" class="form-control" >
											@if ($errors->has('password_confirmation'))
											<p style="color: red;">{{$errors->first('password_confirmation')}}</p>
											@endif
										</div>
										<div class="margin-top-10">
											<button type="submit" id="sub-password" class="btn green">Change</button>
										</div>
									</form>
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