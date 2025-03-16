@extends("layouts.master")

@section("content")
<div class="main-content mt-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Trashed Blog Posts</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{route('posts.index')}}" class="btn btn-dark mx-1"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%">Image</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 10%">Category</th>
                        <th scope="col" style="width: 10%">Publish Date</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                <img src="{{asset('storage/' . $post->image)}}" alt="" width="80">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{date('d-M-Y', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="{{route('posts.restore', $post->id)}}" class="btn-sm btn-primary" style="text-decoration: none;">Restore</a>
                                <form action="{{route('posts.force-delete', $post->id)}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger mt-1" style="text-decoration: none;">Delete Permanetly</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection