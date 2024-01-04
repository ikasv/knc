@extends('admin.app')
​
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Site Settings</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
​
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
​
				<!-- general form elements -->
				<div class="card card-default">
​
				  @if($errors->any())
​
				  	<div class="card-body mb-0 pb-0">
​
					  	<div class="alert alert-danger pb-0">
​
						  	<ul>
						  	@foreach($errors->all() as $error)
​
						  	<li>{{ $error }}</li>
​
						  	@endforeach
						  	</ul>
​
					  	</div>
​
					</div>
​
				  @endif
​
					@if($message = Session::get('success'))
					<div class="card-body mb-0 pb-0">
						<div class="alert alert-success">
							{{ $message }}
						</div>
					</div>
					@elseif($message = Session::get('error'))
					<div class="card-body mb-0 pb-0">
						<div class="alert alert-danger">
							{{ $message }}
						</div>
					</div>
					@endif
​
				  <!-- form start -->
				  <form method="post" action="{{ route('admin::sitesettings.update',$sitesetting->id) }}" enctype="multipart/form-data">
				  	@csrf
				  	@method('PUT')
				    <div class="card-body row">
​
<div class="col-md-6">
	<div class="form-group">
		<label for="name">Site Name</label>
		<input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter site name" value="{{ old('site_name', $sitesetting->site_name) }}">
	</div>
</div>

<div class="col-md-6">
				      <div class="form-group">
				        <label for="header_line">Header Line</label>
				        <input type="text" class="form-control" id="header_line" name="header_line" placeholder="Enter header line" value="{{ old('header_line', $sitesetting->header_line) }}">
				      </div>
				      </div>
​
				      <div class="form-group col-md-12">
				        <label for="top_header_text">Top Header Text</label>
				        <textarea class="form-control" id="top_header_text" name="top_header_text" placeholder="Enter top header text">{{ old('top_header_text', $sitesetting->top_header_text) }}</textarea>
				      </div>
​
				      <div class="form-group col-md-12">
				        <label for="footer_text">Footer Text</label>
				        <textarea class="form-control" id="footer_text" name="footer_text" placeholder="Enter footer text">{{ old('footer_text', $sitesetting->footer_text) }}</textarea>
				      </div>
​
				      <div class="form-group col-md-6">
				        <label for="logo">Logo</label>
						<input type="file" class="form-control" name="site_logo" id="logo" accept="image/*">
						@if (isset($sitesetting->logo) && $sitesetting->logo != '')
							<a target='_blank' href="{{ asset('storage/site').'/'.$sitesetting->logo }}" class='text-primary'>View</a>
							<input type="hidden" class="form-control" name="old_site_logo" value="{{ $sitesetting->logo }}">
						@endif
					</div>
					​
					<div class="form-group col-md-6">
						<label for="fav-icon">Fav-icon</label>
						<input type="file" class="form-control" name="site_fav_icon" id="fav-icon" accept="image/*">
						@if (isset($sitesetting->fav_icon) && $sitesetting->fav_icon != '') 
							<a target='_blank' href="{{ asset('storage/site').'/'.$sitesetting->fav_icon }}" class='text-primary'>View</a>
							<input type="hidden" class="form-control" name="old_site_fav_icon" value="{{ $sitesetting->fav_icon }}">
						
						@endif
				      </div>
​
					  <div class="col-12 my-3">
						<h5>Address</h5>
					  </div>
​
					  <div class="form-group col-md-6">
				        <label for="streetAddress">Street Address</label>
				        <input type="text" class="form-control" id="streetAddress" name="address[streetAddress]" placeholder="Enter Street Address" value="{{ old('address[streetAddress]', $sitesetting->address->streetAddress) }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="addressLocality">Address Locality</label>
				        <input type="text" class="form-control" id="addressLocality" name="address[addressLocality]" placeholder="Enter Address Locality" value="{{ old('address[streetAddress]', $sitesetting->address->addressLocality) }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="addressRegion">Address Region</label>
				        <input type="text" class="form-control" id="addressRegion" name="address[addressRegion]" placeholder="Enter Address Region" value="{{ old('address[streetAddress]', $sitesetting->address->addressRegion) }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="postalCode">Postal Code</label>
				        <input type="text" class="form-control" id="postalCode" name="address[postalCode]" placeholder="Enter Postal Code" value="{{ old('address[streetAddress]', $sitesetting->address->postalCode) }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="telephone">Telephone</label>
				        <input type="text" class="form-control" id="telephone" name="address[telephone]" placeholder="Enter Telephone" value="{{ old('address[streetAddress]', $sitesetting->address->telephone) }}">
				      </div>
​
					  <div class="col-12 my-3">
						<h5>Social links</h5>
					  </div>
​
					  <div class="form-group col-md-6">
				        <label for="facebook">Facebook</label>
				        <input type="url" class="form-control" id="facebook" name="socialLinks[facebook]" placeholder="Enter facebook URL" value="{{ old('socialLinks[facebook]', $sitesetting->socialLinks->facebook ?? '') }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="twitter">Twitter</label>
				        <input type="url" class="form-control" id="twitter" name="socialLinks[twitter]" placeholder="Enter twitter URL" value="{{ old('socialLinks[twitter]', $sitesetting->socialLinks->twitter ?? '') }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="youtube">Youtube</label>
				        <input type="url" class="form-control" id="youtube" name="socialLinks[youtube]" placeholder="Enter youtube URL" value="{{ old('socialLinks[youtube]', $sitesetting->socialLinks->youtube ?? '') }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="instagram">Instagram</label>
				        <input type="url" class="form-control" id="instagram" name="socialLinks[instagram]" placeholder="Enter instagram URL" value="{{ old('socialLinks[instagram]', $sitesetting->socialLinks->instagram ?? '') }}">
				      </div>
​
					  <div class="form-group col-md-6">
				        <label for="linkedin">Linkedin</label>
				        <input type="url" class="form-control" id="linkedin" name="socialLinks[linkedin]" placeholder="Enter linkedin URL" value="{{ old('socialLinks[linkedin]', $sitesetting->socialLinks->linkedin ?? '') }}">
				      </div>

					  <div class="form-group col-md-12">
				        <label for="disclaimer">Disclaimer</label>
				       <textarea class="form-control" id="disclaimer" name="disclaimer" rows="10" placeholder="Enter disclaimer here">{{ old('disclaimer', $sitesetting->disclaimer) }}</textarea>
				      </div>

					  <div class="form-group col-md-12">
				        <label for="custom_css">Custom CSS</label>
				       <textarea class="form-control" id="custom_css" name="custom_css" rows="10" placeholder="Enter Custom CSS here">{{ old('footer_text', $sitesetting->custom_css) }}</textarea>
				      </div>
​
					  <div class="form-group col-md-12">
				        <label for="custom_css">Custom JS</label>
				        <textarea class="form-control" id="custom_js" name="custom_js" rows="10" placeholder="Enter Custom JS here">{{ old('footer_text', $sitesetting->custom_js) }}</textarea>
				      </div>
​
​
				    </div>
				    <!-- /.card-body -->
​
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
​
@endsection
​
@section('content_js')
<script>
//Date picker
$('#reservationdate').datetimepicker({
    format: 'L'
});
</script>
@endsection