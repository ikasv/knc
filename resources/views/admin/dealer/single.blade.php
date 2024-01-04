@extends('admin.app')

@section('content')
<style>
	span.select2-selection.select2-selection--single {
		height: 37px;
		padding: 6px;
	}

	.select2-container--default .select2-selection--single .select2-selection__arrow {
		top: 5px;
		right: 5px;
	}
</style>


<!-- Main content -->
<section class="content">
	<div class="container pt-5">
		<div class="card">
			<div class="card-header bg-primary">
				<div class="row">
					<div class="col-sm-6 text-left align-self-center">
						<h5 class="m-0">{{ $title ?? 'Page Title' }}</h5>
					</div>
					@can('permissions', [$permission_key, 'view'] ?: [])
					<div class="col-sm-6 text-right">
						<a class="btn btn-warning" href="{{ route($index_route) }}">List</a>
					</div>
					@endcan
				</div>
			</div>
			<div class="card-body p-4">
				@if(session()->has('back_msg'))
					{!! session()->get('back_msg') !!}
				@endif
				<div class="row">
					<!-- left column -->
					<div class="col-md-12">
						<!-- form start -->
						<form method="post" action="{{ route($store_route) }}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{ $record->id ?? '' }}">
							<div class="row">
								<div class="col-md-12">
									<!-- Details -->
									<details open class="my-2" style="padding: 12px; background: aliceblue;">
										<summary>Details</summary>
										<div class="row p-3">
							
											<!-- Sales Executive -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="sales_executive_id">Sales Executive <span class="text-danger">*</span></label>
													<select name="sales_executive_id" id="sales_executive_id" class="form-control" required>
														<option value="" selected disabled>Chooose</option>
														@foreach (App\Models\SalesExecutive::active()->get() ?? [] as $sales_executive)
															<option value="{{ $sales_executive->id }}" {{ isset($record->sales_executive_id) && $record->sales_executive_id == $sales_executive->id ? 'selected' : ''   }}>{{ $sales_executive->name }}</option>
														@endforeach
													</select>
													@error('joining_date') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Sales Executive -->

											<!-- Name -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="name">Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name', $record->name ?? '') }}" required>
													@error('name') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Name -->
											
											<!-- Email -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="email">Email <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $record->email ?? '') }}" required>
													@error('email') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Email -->
											
											<!-- Mobile -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="mobile">Mobile <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" value="{{ old('mobile', $record->mobile ?? '') }}" required>
													@error('mobile') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Mobile -->
										
											<!-- Profile Image -->
											<div class="col-md-4">
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

											<!-- Status -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="status">Status</label>
													<select type="text" class="form-control" id="status" name="status">
														<option value="1" {{ ( isset($record) && $record->status == 1 ) ? 'selected' : '' }}>Active</option>
														<option value="0" {{ ( isset($record) && $record->status == 0 ) ? 'selected' : '' }}>Deactive</option>
													</select>
												</div>
											</div>
											<!-- End Status -->

										</div>
									</details>
									<!-- End Details -->
								</div>
								
								<div class="col-md-12">
									<!-- Details -->
									<details open class="my-2" style="padding: 12px; background: aliceblue;">
										<summary>Business Details</summary>
										<div class="row p-3">

											<!-- Business Id -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="business_id">Business Id <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="business_id" name="business_id" placeholder="Enter business id" value="{{ old('business_id', $record->business_id ?? '') }}" required>
													@error('business_id') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Business Id -->
											
											<!-- Business Name -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="business_name">Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter business name" value="{{ old('business_name', $record->business_name ?? '') }}" required>
													@error('business_name') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Name -->
											
											<!-- Email -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="email">Email <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="business_email" name="business_email" placeholder="Enter business email" value="{{ old('business_email', $record->business_email ?? '') }}" required>
													@error('business_email') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Email -->
											
											<!-- Mobile -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="business_mobile">Mobile <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="business_mobile" name="business_mobile" placeholder="Enter mobile" value="{{ old('business_mobile', $record->business_mobile ?? '') }}" required>
													@error('business_mobile') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Mobile -->
										
											<!-- GST Number -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="business_gst_number">GST No. <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="business_gst_number" name="business_gst_number" placeholder="Enter gst number" value="{{ old('business_gst_number', $record->business_gst_number ?? '') }}" required>
													@error('business_gst_number') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End GST Number -->
											
											<!-- Address -->
											<div class="col-md-12">
												<div class="form-group">
													<label for="business_address">Address <span class="text-danger">*</span></label>
													<textarea class="form-control" id="business_address" name="business_address" placeholder="Enter address" required>{{ old('address', $record->business_address ?? '') }}</textarea>
													@error('address') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Address -->
										
										</div>
									</details>
									<!-- End Details -->
								</div>

								<div class="col-md-12 mt-4">
									<button type="submit" class="btn-dm-sm btn-dm-primary btn-lg">Submit</button>
								</div>
							</div>
							<!-- /.card-body -->

						</form>
					</div>
				</div>
			</div>

		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('script')
<script>
	$('#number_of_days, #number_of_nights').on('change', function(){
		var duration    		= "";
		var number_of_days   	= $('#number_of_days').val();
		var number_of_nights   	= $('#number_of_nights').val();

		if(number_of_days && number_of_nights){
			duration			=	`${number_of_days} day's and ${number_of_nights} night's`;
		}
		
		if(number_of_days && !number_of_nights){
			duration			=	`${number_of_days} day's `;
		}
		
		if(!number_of_days && number_of_nights){
			duration			=	`${number_of_nights} night's `;
		}

		$('#duration').val(duration);
	});
	


</script>
@endsection