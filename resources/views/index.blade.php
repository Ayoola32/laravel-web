@extends("layouts.master")

@section("content")
<div class="main-content mt-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Blog Posts</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{route('posts.create')}}" class="btn btn-success mx-1">Create</a>
                    <a href="" class="btn btn-dark mx-1">Trash</a>
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
                            <td>{{$post->category_id}}</td>
                            {{-- <td>{{$post->created_at->format('d-m-Y')}}</td> --}}
                            <td>{{date('d-M-Y', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="{{route('posts.show', $post->id)}}" class="btn-sm btn-primary" style="text-decoration: none;">Show</a>
                                <a href="{{route('posts.edit', $post->id)}}" class="btn-sm btn-warning" style="text-decoration: none;">Edit</a>
                                {{-- <a href="" class="btn-sm btn-danger" style="text-decoration: none;">Delete</a> --}}

                                <form action="{{route('posts.destroy', $post->id)}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger mt-1" style="text-decoration: none;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="https://picsum.photos/200" alt="" width="80">
                        </td>
                        <td>Post Title</td>
                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut autem quod mollitia incidunt eius dolorem quos modi quas itaque ex!</td>
                        <td>Crud</td>
                        <td>28-02-2025</td>
                        <td>
                            <a href="" class="btn-sm btn-primary" style="text-decoration: none;">Show</a>
                            <a href="" class="btn-sm btn-warning" style="text-decoration: none;">Edit</a>
                            <a href="" class="btn-sm btn-danger" style="text-decoration: none;">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection