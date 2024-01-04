@extends('admin.app')

@section('content')


<!-- Main content -->
<section class="content">
	<div class="container-fluid pt-5">

		<div class="card">

			<div class="card-header bg-primary">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h5 class="m-0">Category List</h5>
					</div>
					@can('permissions', ['categories', 'create'])
					<div class="col-sm-6 text-right">
						<a class="btn btn-warning" href="{{ route('admin::categories.create') }}">Add</a>
					</div>
					@endcan
				</div>
			</div>
			<div class="card-body">
				@if(session()->has('back_msg'))
					{!! session()->get('back_msg') !!}
				@endif
				<div class="row">
					<div class="col-12">

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
									<th style="width: 50px;" class="text-center">#</th>
									<th>Name</th>
									<th>Status</th>
									<th style="width: 100px;" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as $row)
									<tr>
										<td class="text-center">{{ $loop->iteration }}</td>
										<td>{{ $row->name }} {{ $row->parent_id == 0 ? '( Main )' : '' }}</td>
										<td>{!! $row->status_label_view !!}</td>
										<td class="text-center">
											@can('permissions', ['categories', 'edit'])
											<a href="{{ route('admin::categories.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
											@endcan

											@can('permissions', ['categories', 'delete'])
											<form action="{{ route('admin::categories.destroy',$row->id) }}" method="post" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
											</form>
											@endcan
										</td>
									</tr>
								@endforeach

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
	$(function() {
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
			if (result.value == 1) {
				$(th).parent().submit();
			}
		});
	}
</script>
@endsection