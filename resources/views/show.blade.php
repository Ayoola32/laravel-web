@extends("layouts.master")

@section("content")
<div class="main-content mt-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Show Blog Post</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{route('posts.index')}}" class="btn btn-dark mx-1"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>{{$post->id}}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <img src="{{asset('storage/' . $post->image)}}" alt="" width="300">
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{$post->title}}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{$post->category->name}}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{$post->created_at->format('d-m-Y')}}</td>
                    <tr>
                        <td>Description</td>
                        <td>{{$post->description}}</td>     
                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection