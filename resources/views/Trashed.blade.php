@extends("layouts.master")

@section("content")
<div class="main-content mt-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3><a href="{{route('posts.index')}}" style="text-decoration: none;">Trashed Posts</a></h3>
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