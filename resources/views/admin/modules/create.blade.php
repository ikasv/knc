@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Module</h1>
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

				  <!-- form start -->
				  <form method="post" action="{{ route('admin::modules.store') }}" autocomplete="off">
				  	@csrf
				    <div class="card-body row">

				      <div class="form-group col-md-4">
				        <label for="module_name">Module Name</label>
				        <input type="text" class="form-control" id="module_name" name="module_name" placeholder="Enter module name" value="{{ old('module_name') }}">
				      </div>

				      <div class="form-group col-md-4">
				        <label for="module_code">Module Code</label>
				        <input type="text" class="form-control" id="module_code" name="module_code" placeholder="Enter module code" value="{{ old('module_code') }}">
				      </div>

				      <div class="form-group col-md-4">
				        <label for="status">Status</label>
				        <select type="text" class="form-control" id="status" name="status">
				        <option value="">Select Status</option>
				        <option value="1" {{ (old('status')=="1" || old('status')==null)?'selected':'' }}>Active</option>
				        <option value="0" {{ (old('status')=="0")?'selected':'' }}>Deactive</option>
				        </select>
				      </div>

				      <div class="form-group col-md-12">
				        <h5>Permissions</h5>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="perm_create" name="perm_create" value="1" {{ (old('perm_create')==1)?'checked':'' }} >
							<label class="form-check-label" for="perm_create">Create</label>
						</div>
						<div class="form-check mt-2">
							<input type="checkbox" class="form-check-input" id="perm_edit" name="perm_edit" value="1" {{ (old('perm_edit')==1)?'checked':'' }}>
							<label class="form-check-label" for="perm_edit">Edit</label>
						</div>
						<div class="form-check mt-2">
							<input type="checkbox" class="form-check-input" id="perm_delete" name="perm_delete" value="1" {{ (old('perm_delete')==1)?'checked':'' }}>
							<label class="form-check-label" for="perm_delete">Delete</label>
						</div>
						<div class="form-check mt-2">
							<input type="checkbox" class="form-check-input" id="perm_view" name="perm_view" value="1" {{ (old('perm_view')==1)?'checked':'' }}>
							<label class="form-check-label" for="perm_view">View</label>
						</div>
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