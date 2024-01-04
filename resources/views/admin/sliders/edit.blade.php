@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Slider</h1>
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

				  <!-- form start -->
				  <form method="post" action="{{ route('admin::sliders.update',$slider->id) }}" autocomplete="off" enctype="multipart/form-data">
				  	@csrf
				  	@method('PUT')

				  	<div class="card-body row">

				      <div class="form-group col-md-6">
				        <label for="slider_name">Slider Name</label>
				        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name',$slider->name) }}" required="" onkeyup="makeurl(this.value)" onblur="makeurl(this.value)">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="slider_name">Slider Code</label>
				        <input type="text" class="form-control" placeholder="" value="{{ old('code',$slider->code) }}" readonly>
				      </div>

				      <div class="form-group col-md-6">
				        <label for="sku">Slider Class</label>
				        <input type="text" class="form-control" id="class" name="class" placeholder="" value="{{ old('class',$slider->class) }}">
				      </div>

				      <div class="form-group col-md-6">
				        <label for="status">Type</label>
				        <select type="text" class="form-control" id="type" name="type" required="">
				        <option value="">Select Type</option>
				        <option value="1" {{ (old('type',$slider->type)=="1" || old('type')==null)?'selected':'' }}>Full Width Slider</option>
				       <!--  <option value="2" {{ (old('type',$slider->type)=="2")?'selected':'' }}>Event Slider</option> -->
				        </select>
				      </div>

				      <div class="form-group col-md-6">
				        <label for="status">Status</label>
				        <select type="text" class="form-control" id="status" name="status" required="">
				        <option value="">Select Status</option>
				        <option value="1" {{ (old('status',$slider->status)=="1" || old('status')==null)?'selected':'' }}>Active</option>
				        <option value="0" {{ (old('status',$slider->status)=="0")?'selected':'' }}>Deactive</option>
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

@section('content_js')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
function makeurl(val){
	var string =val.toLowerCase().replace(/[^\w\s]/gi, '');
	document.getElementById("code").value = string.replace(/\s/g, '-');
}
$("#category_ids").select2();
$('.ckeditor').ckeditor();

function deleteGalleryImage(th,id=''){
	if (id=='') {
		$(th).parent().parent().remove();
	}
	else {
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  showConfirmButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value==1) {
		    deleteSliderGalleryImage(th,id);
		  }
		});
	}
}

function deleteSliderGalleryImage(th,id='') {
	$.ajax({
		url: "{{ url('admin/sliders/deleteSliderGalleryImage') }}",
		type        : 'post',
		data        : {"id":id,"_token":"{{ csrf_token() }}"},
		beforeSend: function() {
		},                        
		success: function(response){
			$(th).parent().remove();
			Swal.fire(
		      'Deleted!',
		      'Image has been deleted.',
		      'success'
		    );
		},
		error: function(){
			Swal.fire(
		      'Error!',
		      'Some error occured.',
		      'error'
		    );
		}
	});
}

function changeAttributeSet() {
	var attribute_set_id = $("#attribute_set_id").val();
	var slider_id = "{{ $slider->id }}";
	
	$.ajax({
		url: "{{ url('admin/sliders/getSliderAttributeFields') }}",
		type        : 'post',
		data        : {"attribute_set_id":attribute_set_id,"slider_id":slider_id,"_token":"{{ csrf_token() }}"},
		beforeSend: function() {
		},                        
		success: function(response){
			$(".slider_attributes").html(response);
		},
		error: function(){
		}
	});
}

</script>
@endsection