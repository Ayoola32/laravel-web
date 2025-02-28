@extends("layouts.master")

@section("content")
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Update Post</h3>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('posts.index')}}" class="btn btn-dark mx-1"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                {{-- This is a form page --}}
                <form action="">
                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="name" name="title" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Category</label>
                        <select name="" id="" class="form-control">
                            <option value="">Test 1</option>
                            <option value="">Test 2</option>
                            <option value="">Test 3</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="descripion">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection