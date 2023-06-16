<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.title', 'posts.content', 'posts.slug', 'posts.status', 'categories.name as category_name')
            ->paginate(5);
            return view('pages.dashboard.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard.post.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $validatedData = $request->validated();
        $slugRequest = Str::slug($validatedData['title']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $post = new Post;
        $post->category_id = $validatedData['category_id'];
        $post->title = $validatedData['title'];
        if (Post::where('slug', $slugRequest)->exists()) {
            $post->slug = $slug;
        } else {
            $post->slug = $slugRequest;
        }
        $post->content = $validatedData['content'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }
        $post->status = $validatedData['status'];;
        $post->save();
        return redirect('dashboard/posts')->with('message', 'Post Has Added');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('pages.dashboard.post.edit', compact('post', 'categories'));
    }
    
    public function update(PostFormRequest $request, $post)
    {
        $validatedData = $request->validated();
        $post = Post::findOrFail($post);

        $post->category_id = $validatedData['category_id'];
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];

        if ($request->hasFile('image')) {

            $path = 'uploads/post/' . $post->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/post/', $filename);
            $post->image =  $filename;
        }
        $post->status = $validatedData['status'];

        $post->update();
        return redirect('dashboard/posts')->with('message', 'Post update Succesfully');
    }

    public function destroy(int $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->delete();

        return redirect('dashboard/posts')->with('status', 'Post Delete Successfully');
    }
}
