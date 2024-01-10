@extends('admin.app')

@section('content')


<!-- Main content -->
<section class="content">
	<div class="container-fluid pt-5">

		<div class="card">

			<div class="card-header bg-primary">
				<div class="row">
					<div class="col-sm-6 align-self-center">
						<h5 class="m-0">{{ $title ?? 'Records' }}</h5>
					</div>
					@can('permissions', [$permission_key, 'create'])
					<div class="col-sm-6 text-right">
						<a class="btn btn-warning btn-sm" href="{{ route($create_route) }}">Add</a>
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
									<th>Created Date</th>
									<th>Status</th>
									<th style="width: 100px;" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($records ?? [] as $record)
									<tr>
										<td class="text-center">{{ $loop->iteration }}</td>
										<td>{{ $record->name }}</td>
										<td>{{ $record->created_at }}</td>
										<td>{!! $record->status_view !!}</td>
										<td class="text-center">
											@if($record->deleted_at)
												<form action="{{ route($restore_route, $record->id) }}" method="post" class="d-inline">
													@csrf
													@method('PATCH')
													<button type="button" class="btn btn-success btn-sm ml-2" onclick="retoreRecord(this)"><i class="fa fa-trash-restore f-12"></i></button>
												</form>
											@else
												@can('permissions', [$permission_key, 'edit'])
													<a href="{{ route($edit_route, $record->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit f-12"></i></a>
												@endcan

												@can('permissions', [$permission_key, 'delete'])
												<form action="{{ route($destroy_route, $record->id) }}" method="post" class="d-inline">
													@csrf
													@method('DELETE')
													<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash f-12"></i></button>
												</form>
												@endcan
											@endif
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
	
	function retoreRecord(th) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You restoring this record !",
			icon: 'warning',
			showCancelButton: true,
			showConfirmButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, restore it!'
		}).then((result) => {
			if (result.value == 1) {
				$(th).parent().submit();
			}
		});
	}
</script>
@endsection