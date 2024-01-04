@extends('admin.app')

@section('content')
    <section class="tags-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card  mt-5">
                        <div class="card-header bg-primary">
                                Update Tag
                        </div>
                        <div class="card-body p-4">
                            @if(Session::has('success'))
                                {!! Session::get('success') !!}
                            @endif
                            <form method="post" action="{{ route('tags.update', $tag->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="tag" placeholder="Enter tag name" value="{{ $tag->tag }}"  required>
                                            @error('tag')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <input type="submit" class="btn-dm-sm btn-dm-primary" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection