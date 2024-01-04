@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Slide</h1>
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

				  @if($message=Session::get('success'))
					<div class="card-body mb-0 pb-0">
					  	<div class="alert alert-success">
							  {{ $message }}
						</div>
					</div>
				  @endif
				  @if($message=Session::get('error'))
					<div class="card-body mb-0 pb-0">
					  	<div class="alert alert-danger">
							  {{ $message }}
						</div>
					</div>
				  @endif

				  <!-- form start -->
				  <form method="post" action="{{ url('admin/sliders/add_slide_process') }}" autocomplete="off" enctype="multipart/form-data">
				  	@csrf
				  	<input type="hidden" name="slider_id" value="{{ $slider->id }}">
				    <div class="card-body row">

				      <div class="form-group col-md-6">
				        <label for="price">Image</label>
				        <input type="file" class="form-control" id="image" name="image" accept="image/*">
				      </div>
                      
                      <!-- -->
                      	<div class="form-group col-md-6">
					        <label for="mobile_image">Mobile Image</label>
					        <input type="file" class="form-control" id="mobile_image" name="mobile_image" accept="image/*">
				     	</div>
                      <!-- -->

				      <div class="form-group col-md-6 d-none">
				        <label for="video_url">Video URL</label>
				        <input type="text" class="form-control" id="video_url" name="video_url" placeholder="" value="{{ old('video_url') }}">
				      </div>

				      <div class="form-group col-md-12">
				        <label for="heading">Heading</label>
				        <input type="text" class="form-control" id="heading" name="heading" placeholder="" value="{{ old('heading') }}">
				      </div>

				      <div class="form-group col-md-12">
				        <label for="description">Description</label>
				        <textarea type="text" class="form-control" id="description" name="description" placeholder="">{{ old('description') }}</textarea>
				      </div>

				      <div class="form-group col-md-6">
				        <label for="btn_text">Button Text</label>
				        <input type="text" class="form-control" id="btn_text" name="btn_text" placeholder="" value="{{ old('btn_text') }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="btn_link">Button Link</label>
				        <input type="text" class="form-control" id="btn_link" name="btn_link" placeholder="" value="{{ old('btn_link') }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="class">Slide Class</label>
				        <input type="text" class="form-control" id="class" name="class" placeholder="" value="{{ old('class') }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="sort_order">Sort Order</label>
				        <input type="text" class="form-control" id="sort_order" name="sort_order" placeholder="" value="{{ old('sort_order') }}">
				      </div>
				
				      <div class="form-group col-md-12"><hr></div>
				      
				      <div class="form-group col-md-6">
				        <label for="slider_url">Slider Url</label>
				        <input type="text" class="form-control" id="slider_url" name="slider_url" placeholder="Slider Url" value="{{ old('slider_url') }}">
				      </div>
				      
				      <div class="form-group col-md-6 d-none">
				        <label for="deep_link">Deep Link</label>
				        <input type="text" class="form-control" id="deep_link" name="deep_link" placeholder="Deep Link" value="{{ old('deep_link') }}">
				      </div>
				      
				      <div class="form-group col-md-6">
				        <label for="status">Active</label>
                        <select class="form-control" id="status" class="status" name="status">
                            <option value="1" selected>Active</option>
                            <option value="0">Deactive</option>
                        </select>
				      </div>
				      
				      <div class="form-group col-md-6 d-none">
				        <label for="open_url_for_android_app">Open Url ( Android App) </label>
                        <select class="form-control" id="open_url_for_android_app" class="open_url_for_android_app" name="open_url_for_android_app">
                            <option value="" selected>Choose</option>
                            <option value="1">Web Browser</option>
                            <option value="2">Webview</option>
                        </select>
				      </div>
				      
				      <div class="form-group col-md-6">
				        <label for="slider_for">Slider for</label>
                        <select class="form-control" id="slider_for" class="slider_for" name="slider_for">
                            <option value="0" selected>All</option>
                            <option value="1">Web</option>
                            <option value="2">App</option>
                        </select>
				      </div>

				    </div>
				    <!-- /.card-body -->

				    <div class="card-footer">
				      <button type="submit" class="btn-dm-sm btn-dm-primary btn-lg">Submit</button>
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

@section('content_js')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$("#category_ids").select2();
$('.ckeditor').ckeditor();
</script>
@endsection