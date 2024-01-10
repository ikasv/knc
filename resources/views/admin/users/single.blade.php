@extends('admin.app')

@section('content')


<!-- Main content -->
<section class="content pt-4">
	<div class="container">
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

					<div class="card-header bg-primary">
						<div class="row">
							<div class="col-sm-6 text-left align-self-center">
								<h5 class="m-0">Add / Edit Users</h5>
							</div>
							@can('permissions', ['users', 'create'])
							<div class="col-sm-6 text-right">
								<a class="btn btn-warning" href="{{ route('admin::users.index') }}">List</a>
							</div>
							@endcan
						</div>
					</div>


					<!-- form start -->
					<div class="card-body p-4">
						<form method="post" action="{{ route('admin::users.store') }}" autocomplete="off" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{ $record->id ?? '' }}">
							<div class="row">

							<div class="form-group col-md-6">
									<label for="first_name">Dealer's</label>
									<select class="form-control" name="dealer_id" id="dealer_id">
										<option value="" disabled selected>Choose</option>
										@foreach(App\Models\Dealer::active()->get() as $dealer)
										<option value="{{ $dealer->id }}" {{ ( $record->dealer_id ?? 0 ) == $dealer->id ? 'selected' : '' }} @if(old('dealer_id')==$dealer->id) selected @endif >{{ $dealer->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-md-6">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter first name" value="{{ old('name', $record->name ?? '') }}">
								</div>

								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $record->email ?? '') }}">
								</div>

								<div class="form-group col-md-6">
									<label for="mobile">Mobile</label>
									<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" value="{{ old('mobile', $record->mobile ?? '') }}">
								</div>

								<!-- Profile Image -->
								<div class="col-md-6">
									<div class="form-group">
										<label for="profile_image">Profile Image<span class="text-danger">*</span></label>
										<input type="file" class="form-control p-1" id="profile_image" name="profile_image" accept="image/*">
										@error('profile_image') <div class="text-danger">{{ $message }}</div> @enderror

										@if(isset($record) && $record->profile_image != '')
											<input type="hidden" name="old_profile_image" value="{{ $record->profile_image }}">
											<img src="{{ $record->profile_image_url }}" alt="" class="mt-2" width="50px" height="50px">
										@endif
									</div>
								</div>
								<!-- Profile Image -->

								<div class="form-group col-md-6">
									<label for="password">Password</label>
									<input type="text" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ old('password') }}">
								</div>

								<!-- Status -->
								<div class="col-md-4">
									<div class="form-group">
										<label for="status">Status</label>
										<select type="text" class="form-control" id="status" name="status">
											<option value="0" {{ ( isset($record) && $record->status == 0 ) ? 'selected' : '' }}>Pending</option>
											<option value="1" {{ ( isset($record) && $record->status == 1 ) ? 'selected' : '' }}>Approve</option>
											<option value="2" {{ ( isset($record) && $record->status == 2 ) ? 'selected' : '' }}>Reject</option>
										</select>
									</div>
								</div>
								<!-- End Status -->

								<div class="col-md-12 mt-2">
									<div class="text-center">
										<button type="submit" class="btn-sm btn-primary btn-lg">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- /.card-body -->

				</div>
				<!-- /.card -->
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection