<div class="container my-5">
    <div class="mx-2">
        <div class="row justify-content-between mb-2 pb-2">
            <h2 class="fw-bold fs-2 col-auto">All Testimonials</h2>
            <a href="{{route('test.create')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new testimonial</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover display" id="_table">
                <thead>
                    <tr>
                        <th scope="col">Created At</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Published</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $test)
                    <tr>
                        <th scope="row">{{$test->created_at->format('d M Y')}}</th>
                        <td>{{$test->name}}</td>
                        <td>{{Str::limit($test['content'],20, $end='...')}}</td>
                        <td>{{ $test->published ? 'Yes' : 'NO' }}</td>
                        <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('test.edit',$test->id)}}"><img src="{{asset('assets/admin/images/edit-svgrepo-com.svg')}}"></a></td>
                        <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('test.delete',$test->id)}}"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
