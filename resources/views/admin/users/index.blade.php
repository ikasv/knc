@extends('admin.app')

@section('content')

<!-- Main content -->
<section class="content pt-5">
	<div class="container-fluid">
		<div class="row">
	          <div class="col-12">
	            <div class="card">

				<div class="card-header bg-primary">
					<div class="row">
						<div class="col-sm-6 align-self-center">
							<h5 class="m-0">{{ $title ?? 'Records' }}</h5>
						</div>
						@can('permissions', ['users', 'create'])
						<div class="col-sm-6 text-right">
							<a class="btn btn-warning btn-sm" href="{{ route('admin::users.create') }}">Add</a>
						</div>
						@endcan
					</div>
				</div>

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
	                    <th>Name</th>
	                    <th>Mobile</th>
	                    <th>Email</th>
	                    <th>Created Date</th>
	                    <th>Status</th>
	                    <th style="width: 100px;" class="text-center">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  <?php foreach ($users as $row) { ?>
	                  <tr>
	                    <td>{{ $row->id }}</td>
	                    <td>{{ $row->name }}</td>
	                    <td>{{ $row->mobile }}</td>
	                    <td>{{ $row->email }}</td>
	                    <td>{{ $row->created_at }}</td>
	                    <td>{!! $row->status_view !!}</td>
	                    <td class="text-center">
	                    	@if(isset($permissions['users']) && $permissions['users']['rr_edit']==1)
	                    	<a href="{{ route('admin::users.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
	                    	@endif
	                    	@if(isset($permissions['users']) && $permissions['users']['rr_delete']==1)
	                    	<form action="{{ route('admin::users.destroy',$row->id) }}" method="post" class="d-inline">
	                    	@csrf
	                    	@method('DELETE')
	                    	<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    	@endif
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