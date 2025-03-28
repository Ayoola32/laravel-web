<?php

namespace App\Http\Controllers;

// Facades
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $posts = Post::all();
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:2028', 'image'],
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => ['required']
        ]);

        $filename = time() . '_' . $request->image->getClientOriginalName();
        $filepath = $request->image->storeAs('public/uploads', $filename);
        $filepath = str_replace('public/', '', $filepath);

        
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->image = $filepath;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('show', compact('post',));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('update', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => ['required']
        ]);

        $post = Post::findOrFail($id);


        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'max:2028', 'image'],
            ]);

            $filename = time() . '_' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('public/uploads', $filename);
            $filepath = str_replace('public/', '', $filepath);

            // Delete the old image
            File::delete('storage/' . $post->image);


            $post->image = $filepath;

        }

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * View all Trashed posts
     */
    public function trashed()
    {
        //
        // $posts = Post::onlyTrashed()->get();
        $posts = Post::onlyTrashed()->paginate(5);
        return view('trashed', compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $destroy = Post::findOrFail($id);
        $destroy->delete(); // Soft delete  
        return redirect()->route('posts.index');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        // 
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }

    /**
     * Force delete the specified resource from storage.
     */     
    public function forceDelete(string $id)
    {
        //
        $post = Post::onlyTrashed()->findOrFail($id);
        File::delete('storage/' . $post->image);
        $post->forceDelete(); 
        return redirect()->back();
    }
}
