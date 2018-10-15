
<div class="row">
		<div class="col-md-3 col-md-offset-5">
	        <h3 class="page-header" style="color: blue">USER</h3>
	    </div>
	</div>
	<div class="row">
		<form method="POST" role="form" enctype="multipart/form-data" action="{{is_null($user->id)? route('users.store'):route('users.update',$user->id)}}">
			@csrf
			{{is_null($user->id) ? '' : method_field('PUT') }}
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="box box-primary">
						<div class="box-body">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" name="name" value="{{old('name')? old('name'):$user->name}}" placeholder="Moi ban nhap ten nhan vien">
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="">Email</label>
								<input type="text" class="form-control" name="email" value="{{old('email')? old('email'):$user->email}}" placeholder="Nhap email">
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" name="password" value="{{old('password')? old('password'):$user->password}}" placeholder="Nhap Password">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			</div>
		</form>
	</div>
