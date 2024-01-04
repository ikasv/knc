@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit User</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">

				<!-- general form elements -->
				<div class="card card-default">

				  @if($errors->any())

				  	<div class="card-body mb-0 pb-0">

					  	<div class="alert alert-danger pb-0">

						  	<ul>
						  	@foreach($errors->all() as $error)

						  	<li>{{ $error }}</li>

						  	@endforeach
						  	</ul>

					  	</div>

					</div>

				  @endif

				  <!-- form start -->
				  <form method="post" action="{{ route('admin::users.update',$user->id) }}" autocomplete="off">
				  	@csrf
				  	@method('PUT')
				    <div class="card-body row">

				      <div class="form-group col-md-6">
				        <label for="first_name">First Name</label>
				        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="{{ old('first_name', $user->first_name) }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="last_name">Last Name</label>
				        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="{{ old('last_name', $user->last_name) }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="email">Email</label>
				        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $user->email) }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="mobile">Mobile</label>
				        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" value="{{ old('mobile', $user->mobile) }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="password">Password</label>
				        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ old('password') }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="first_name">Role</label>
				        <select class="form-control" name="role_id" id="role_id">
				        	<option value="">Select Role</option>
				        	@foreach($roles as $role)
				        	<option value="{{ $role->id }}" @if(old('role_id', $user->role_id)==$role->id) selected @endif >{{ $role->name }}</option>
				        	@endforeach
				        </select>
				      </div>

				    </div>
				    <!-- /.card-body -->

				    <div class="card-footer">
				      <button type="submit" class="btn-dm-sm btn-dm-primary btn-lg">Update</button>
				    </div>
				  </form>
				</div>
				<!-- /.card -->
			</div>
    	</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection