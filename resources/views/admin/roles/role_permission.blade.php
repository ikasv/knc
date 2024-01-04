@extends('admin.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Role: {{ $role->name }}</h1>
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
				  <form method="post" action="{{ route('admin::role_permission_update') }}" autocomplete="off">
				  	@csrf
				  	<input type="hidden" id="role_id" name="role_id" value="{{ $role->id }}">

				    <div class="card-body row">

				      <div class="form-group col-md-12">
				  	  	<h4>Permissions</h4>
				  	  </div>

				      <div class="form-group col-md-12">

				        <div class="table-responsive">
                            <table class="table table-bordered" id="empTable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">M.Id</th>
                                        <th>Module Name</th>
                                        <th class="nosort wd-50 text-center">Create</th>
                                        <th class="nosort wd-50 text-center">Edit</th>
                                        <th class="nosort wd-50 text-center">View</th>
                                        <th class="nosort wd-50 text-center">Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  <?php foreach ($module_list as $module) { ?>
                                  <tr>
                                    <td class="text-center"><?= $module->m_id ?></td>
                                    <td><?= $module->module_name ?></td>
                                    <td class="text-center">
                                      <input type="hidden" name="module_id[<?= $module->m_id ?>]" value="<?= $module->m_id ?>">
                                      <?php if($module->perm_create) { ?>
                                        <input type="checkbox" name="module[<?= $module->m_id ?>][rr_create]" value="1" <?php if($module->rr_create) { echo 'checked'; } ?> >
                                      <?php } ?>
                                    </td>
                                    <td class="text-center">
                                      <?php if($module->perm_edit) { ?>
                                        <input type="checkbox" name="module[<?= $module->m_id ?>][rr_edit]" value="1" <?php if($module->rr_edit) { echo 'checked'; } ?> >
                                      <?php } ?>
                                    </td>
                                    <td class="text-center">
                                      <?php if($module->perm_view) { ?>
                                        <input type="checkbox" name="module[<?= $module->m_id ?>][rr_view]" value="1" <?php if($module->rr_view) { echo 'checked'; } ?> >
                                      <?php } ?>
                                    </td>
                                    <td class="text-center">
                                      <?php if($module->perm_delete) { ?>
                                        <input type="checkbox" name="module[<?= $module->m_id ?>][rr_delete]" value="1" <?php if($module->rr_delete) { echo 'checked'; } ?> >
                                      <?php } ?>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>

                            </table>
                        </div>

				      </div>

				    </div>
				    <!-- /.card-body -->

				    <div class="card-footer text-right">
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