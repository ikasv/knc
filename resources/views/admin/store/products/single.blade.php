@extends('admin.app')

@section('content')
<style>
	span.select2-selection.select2-selection--single {
		height: 37px;
		padding: 6px;
	}

	.select2-container--default .select2-selection--single .select2-selection__arrow {
		top: 5px;
		right: 5px;
	}
</style>


<!-- Main content -->
<section class="content">
	<div class="container pt-5">
		<div class="card">
			<div class="card-header bg-primary">
				<div class="row">
					<div class="col-sm-6 text-left align-self-center">
						<h5 class="m-0">{{ $title }}</h5>
					</div>
					@can('permissions', [$permission_key, 'create'])
					<div class="col-sm-6 text-right">
						<a class="btn btn-warning" href="{{ route($index_route) }}">List</a>
					</div>
					@endcan
				</div>
			</div>
			<div class="card-body p-4">
				@if(session()->has('back_msg'))
				{!! session()->get('back_msg') !!}
				@endif
				<div class="row">
					<!-- left column -->
					<div class="col-md-12">
						<!-- form start -->
						<form method="post" action="{{ route($store_route) }}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{ $record->id ?? '' }}">
							<div class="row">
								<div class="col-md-12 ">
									<details open style="padding: 12px; background: aliceblue;">
										<summary>Details</summary>
										<div class="row p-3">

											<!-- Name -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="name">Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control slug" id="name" name="name" placeholder="Enter name" value="{{ old('name', $record->name ?? '') }}" required>
													@error('name') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Name -->

											<!-- Slug -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="price">Slug</label>
													<input type="text" class="form-control set-slug" id="slug" name="slug" placeholder="Enter slug" value="{{ old('slug', $record->slug ?? '') }}">
													@error('slug') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Slug -->
											
											<!-- Sku -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="sku">Sku <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" value="{{ old('sku', $record->sku ?? '') }}" required>
													@error('sku') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Sku -->

											<!-- Category -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="category_id">Category</label>
													<br>
													<select type="text" class="form-control select2" id="category_ids" name="category_ids" >
														<option value="0">Select Category</option>
														@foreach(App\Models\Category::approved()->get() ?? [] as $row)
														<option value="{{ $row->id }}" {{ ( isset($record) && $record->category_id == $row->id ) ? 'selected' : '' }}>{{ $row->name }} {{ $row->parent_id == 0 ? '( Main )' : '' }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<!-- End Category -->
											
											<!-- Dimensions -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="dimensions">Dimensions <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="dimensions" name="dimensions" placeholder="Enter dimensions" value="{{ old('dimensions', $record->dimensions ?? '') }}" required>
													@error('dimensions') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Dimensions -->
											
											<!-- Finishing -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="finishing">Finishing <span class="text-danger">*</span></label>
													<select type="text" class="form-control" id="finishing" name="finishing">
														<option value="1" {{ ( isset($record) && $record->finishing == 'Dark Grey' ) ? 'selected' : '' }}>Dark Grey</option>
													</select>
													@error('finishing') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Finishing -->

											<!-- MRP -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="mrp">MRP <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="mrp" name="mrp" placeholder="Enter mrp" value="{{ old('mrp', $record->mrp ?? '') }}" required>
													@error('mrp') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End MRP -->
											
											<!-- Sale Price -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="sale_price">Sale Price <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Enter sale price" value="{{ old('sale_price', $record->sale_price ?? '') }}" required>
													@error('mrp') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Sale Price -->

											<!-- Packing -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="packing">Packing <span class="text-danger">*</span></label>
													<select type="text" class="form-control" id="packing" name="packing">
														<option value="1" {{ ( isset($record) && $record->packing == 'Set' ) ? 'selected' : '' }}>Set</option>
													</select>
													@error('packing') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Packing -->

											<!-- Points -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="points">Points <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="points" name="points" placeholder="Enter points" value="{{ old('points', $record->points ?? '') }}" required>
													@error('mrp') <div class="text-danger">{{ $message }}</div> @enderror
												</div>
											</div>
											<!-- End Points -->

											<!-- Icon -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="icon">Icon</label>
													<input type="file" class="form-control p-1" id="icon" name="icon" accept="image/*">
													@error('icon') <div class="text-danger">{{ $message }}</div> @enderror
													@if(isset($record) && $record->icon != '')
													<input type="hidden" name="old_icon" value="{{ $record->icon }}">
													<img src="{{ $record->icon_image_url }}" alt="" class="mt-2" width="50px" height="50px">
													@endif
												</div>
											</div>
											<!-- Icon -->

											<!-- Banner Image -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="banner_image">Banner Image</label>
													<input type="file" class="form-control p-1" id="banner_image" name="banner_image" accept="image/*">
													@error('banner_image') <div class="text-danger">{{ $message }}</div> @enderror
													@if(isset($record) && $record->banner_image != '')
													<input type="hidden" name="old_banner_image" value="{{ $record->banner_image }}">
													<img src="{{ $record->banner_image_url }}" alt="" class="mt-2" width="50px" height="50px">
													@endif
												</div>
											</div>
											<!-- End Banner Image -->

											<!-- Featured Image -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="featured_image">Featured Image</label>
													<input type="file" class="form-control p-1" id="featured_image" name="featured_image" accept="image/*">
													@error('featured_image') <div class="text-danger">{{ $message }}</div> @enderror
													@if(isset($record) && $record->featured_image != '')
													<input type="hidden" name="old_featured_image" value="{{ $record->featured_image }}">
													<img src="{{ $record->featured_image_url }}" alt="" class="mt-2" width="50px" height="50px">
													@endif
												</div>
											</div>
											<!-- End Featured Image -->

											<!-- Show on Menu -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="show_on_menu">Show on Menu</label>
													<select type="text" class="form-control" id="show_on_menu" name="show_on_menu">
														<option value="0" {{ ( isset($record) && $record->show_on_menu == 0 ) ? 'selected' : '' }}>No</option>
														<option value="1" {{ ( isset($record) && $record->show_on_menu == 1 ) ? 'selected' : '' }}>Yes</option>
													</select>
												</div>
											</div>
											<!-- End Show on Menu -->

											<!-- Show on Home -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="show_on_home">Show on Home</label>
													<select type="text" class="form-control" id="show_on_home" name="show_on_home">
														<option value="0" {{ ( isset($record) && $record->show_on_home == 0 ) ? 'selected' : '' }}>No</option>
														<option value="1" {{ ( isset($record) && $record->show_on_home == 1 ) ? 'selected' : '' }}>Yes</option>
													</select>
												</div>
											</div>
											<!-- End Show on Home -->

											<!-- Show on Footer -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="show_on_footer">Show on Footer</label>
													<select type="text" class="form-control" id="show_on_footer" name="show_on_footer">
														<option value="0" {{ ( isset($record) && $record->show_on_footer == 0 ) ? 'selected' : '' }}>No</option>
														<option value="1" {{ ( isset($record) && $record->show_on_footer == 1 ) ? 'selected' : '' }}>Yes</option>
													</select>
												</div>
											</div>
											<!-- End Show on Footer -->

											<!-- Featured -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="is_featured">Featured</label>
													<select type="text" class="form-control" id="is_featured" name="is_featured">
														<option value="0" {{ ( isset($record) && $record->is_featured == 0 ) ? 'selected' : '' }}>No</option>
														<option value="1" {{ ( isset($record) && $record->is_featured == 1 ) ? 'selected' : '' }}>Yes</option>
													</select>
												</div>
											</div>
											<!-- End Featured -->

											<!-- Popular -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="is_popular">Popular</label>
													<select type="text" class="form-control" id="is_popular" name="is_popular">
														<option value="0" {{ ( isset($record) && $record->is_popular == 0 ) ? 'selected' : '' }}>No</option>
														<option value="1" {{ ( isset($record) && $record->is_popular == 1 ) ? 'selected' : '' }}>Yes</option>
													</select>
												</div>
											</div>
											<!-- End Popular -->

											<!-- Status -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="status">Status</label>
													<select type="text" class="form-control" id="status" name="status">
														<option value="1" {{ ( isset($record) && $record->status == 1 ) ? 'selected' : '' }}>Active</option>
														<option value="0" {{ ( isset($record) && $record->status == 0 ) ? 'selected' : '' }}>Deactive</option>
													</select>
												</div>
											</div>
											<!-- End Status -->
										</div>
									</details>
								</div>

								<div class="col-md-12 mt-3">
									<details open style="padding: 12px; background: aliceblue;">
										<summary>Gallery</summary>
										<!-- Gallery Images -->
										<x-gallery-images :gallery_images="$gallery_images ?? []"/>
										<!-- End Gallery Images -->
									</details>
								</div>

								<!-- Description Section -->
								<div class="col-md-12 my-3">
									<details {{ isset($record->id) ? 'open' : '' }} style="padding: 12px; background: aliceblue;">
										<summary>Description</summary>
										<div class="col-md-12 mt-4">
											<div class="form-group">
												<label for="name">Short Description</label>
												<textarea type="text" class="form-control ckeditor" id="short_description" name="short_description" placeholder="Enter short description"  value="{{ old('short_description', $record->short_description ?? '') }}">{{ old('short_description', $record->short_description ?? '') }}</textarea>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="name">Long Description</label>
												<textarea type="text" class="form-control ckeditor" id="long_description" name="long_description" placeholder="Enter long description">{{ old('long_description', $record->long_description ?? '') }}</textarea>
											</div>
										</div>
									</details>
								</div>
								<!-- End Description Section -->


								<div class="col-md-12 ">
									<details {{ isset($record->id) ? 'open' : '' }} style="padding: 12px; background: aliceblue;">
										<summary>Meta</summary>
										<div class="col-md-12 mt-4">
											<div class="form-group">
												<label for="name">Meta Title</label>
												<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="" value="{{ old('meta_title', $record->meta_title ?? '') }}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="name">Meta Description</label>
												<textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="">{{ old('meta_description', $record->meta_description ?? '') }}</textarea>
											</div>
										</div>
									</details>
								</div>
								<div class="col-md-12 mt-4">
									<button type="submit" class="btn-dm-sm btn-dm-primary btn-lg">Submit</button>
								</div>
							</div>
							<!-- /.card-body -->

						</form>
					</div>
				</div>
			</div>

		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

