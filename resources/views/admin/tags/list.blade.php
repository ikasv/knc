 @extends('admin.app')

@section('content')
    <section class="tags-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card  mt-5">
                        <div class="card-header bg-primary">
                                Tags
                        </div>
                        <div class="card-body p-4">
                            @if(Session::has('success'))
                                {!! Session::get('success') !!}
                            @endif

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tag</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($tag_list as $row)
                                    <tr>
                                        <td>{{ $row->tag }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('tags.edit', $row->id) }}" class="mx-2"><i class="fa fa-edit text-info"></i></a>
                                            
                                            <form action="{{ route('tags.destroy', $row->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure!');" style="background: transparent; border: 0;"><i class="fa fa-trash text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection