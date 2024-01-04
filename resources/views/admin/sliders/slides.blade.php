@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-md-6">
        <h1 class="m-0">Slide List</h1>
        <h5><b>Slider:</b> {{ $slider->name }}</h5>
      </div><!-- /.col -->
      <div class="col-md-6 text-right pt-3">
        <a href="{{ url('admin/sliders/'.$slider->id.'/add_slide') }}" class="btn btn-dark btn-sm">Add Slide</a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">

		<div class="row">
	          <div class="col-12">

	            <div class="card">

	              <div class="card-body">

	              	@if($message = Session::get('success'))
	              	<div class="alert alert-success">
	              		{{ $message }}
	              	</div>
	              	@elseif($message = Session::get('error'))
	              	<div class="alert alert-danger">
	              		{{ $message }}
	              	</div>
	              	@endif

	                <table id="example2" class="table table-bordered table-hover">
	                  <thead>
	                  <tr>
	                  	<th style="width: 50px;" class="text-center">Sort</th>
	                    <th style="width: 50px;" class="text-center">ID</th>
	                    <th>Slide Image</th>
                         <th>Mobile Slide Image</th>
	                    <th style="width: 80px;" class="text-center">Sort Order</th>
                        <th>Status</th>
	                    <th style="width: 100px;" class="text-center">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody id="sortable">

	                  <?php foreach ($sliders as $row) { ?>
	                  <tr>
	                  	<td class="text-center"><span class='ui-state-default' style="border: none;"><i class='fa fa-th'></i></span></td>
	                    <td class="text-center">{{ $row->id }} <input type="hidden" class="sort_ids" name="ids[]" value="{{ $row->id }}"></td>
                        <td>
	                    @if($row->image && file_exists('uploads/slider/'.$row->image))
				        <a href="{{ url('uploads/slider/'.$row->image) }}" target="_blank"><img src="{{ url('uploads/slider/'.$row->image) }}" class="form-img"></a>
				        @endif
	                    </td>
                        <td>
	                    @if($row->mobile_image && file_exists('uploads/slider/'.$row->mobile_image))
				        <a href="{{ url('uploads/slider/'.$row->mobile_image) }}" target="_blank"><img src="{{ url('uploads/slider/'.$row->mobile_image) }}" class="form-img"></a>
				        @endif
	                    </td>
	                    <td class="text-center">{{ $row->sort_order }}</td>
                         <td>{!! $row->status_view !!}</td>
	                    <td class="text-center">
							@can('permissions', ['sliders', 'edit'])
	                    	<a href="{{ url('admin/sliders/'.$slider->id.'/edit-slide/'.$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    	@endcan

	                    	@can('permissions', ['sliders', 'delete'])
								<form action="{{ route('admin::sliders.deleteSlide',$row->id) }}" method="post" class="d-inline">
									@csrf
									@method('DELETE')
								<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
		                    	</form>
	                    	@endcan
	                    </td>
	                  </tr>
	              	  <?php } ?>

	                  </tfoot>
	                </table>

	                @if(count($sliders)>0)
	                <div class="text-right mt-5">
	                	<button type="button" class="btn btn-dark btn-md" onclick="updateSortOrder()">Update Sort Order</button>
	                </div>
	                @endif

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

@section('content_js')
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $( "#sortable" ).sortable();

function deleteRecord(th) {
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
	  	$(th).parent().submit();
	  }
	});
}

function updateSortOrder() {

var sort_ids = $('.sort_ids').map( function () {
    return $(this).val();
}).get().join();

$.ajax({
	url: "{{ url('admin/slides/updateSortOrder') }}",
	type        : 'post',
	data        : {"id":'{{ $slider->id }}',"sort_ids":sort_ids,"_token":"{{ csrf_token() }}"},
	beforeSend: function() {
	},                        
	success: function(response){
		window.location.href='';
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
</script>
@endsection