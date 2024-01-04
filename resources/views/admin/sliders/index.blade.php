@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
	<div class="card">
<div class="card-header bg-primary">

	<div class="row mb-2">
		<div class="col-sm-6">
			<h3 class="m-0">Slider List</h3>
		</div><!-- /.col -->
		<div class="col-sm-6 text-right">
			<a href="{{ route('admin::sliders.create') }}" class="btn btn-warning">Add</a>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container">

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
	                    <th style="width: 50px;" class="text-center">ID</th>
	                    <th>Heading</th>
	                    <th style="width: 120px;" class="text-center">Manage Slides</th>
                        <th>Status</th>
	                    <th style="width: 100px;" class="text-center">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  <?php foreach ($sliders as $row) { ?>
	                  <tr>
	                    <td class="text-center">{{ $row->id }}</td>
	                    <td>{{ $row->name }}</td>
	                    <td class="text-center"><a href="{{ url('admin/sliders/'.$row->id.'/slides') }}" class="btn btn-dark btn-sm">Manage Slides</a> </td>
                        <td>{!! $row->status_view !!}</td>
	                    <td class="text-center">
	                    	@can('permissions', ['sliders', 'edit'])
	                    	<a href="{{ route('admin::sliders.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    	@endcan
							
	                    	@can('permissions', ['sliders', 'delete'])
	                    	<form action="{{ route('admin::sliders.destroy',$row->id) }}" method="post" class="d-inline">
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
</script>
@endsection