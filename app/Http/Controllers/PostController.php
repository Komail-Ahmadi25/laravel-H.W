<?php

namespace App\Http\Controllers;

use Exception;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
// use Exception;
// use Illuminate\Auth\Access\Gate as AccessGate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('images')->when(request('search'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('search') . '%');
        })->paginate(10);
        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            // Retrieve the validated input data from PostRequest


            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body
            ]);
            $post->save();

            if ($request->hasFile('image1') && $request->hasFile('image2')) {
                $imagepath1 = $request->file('image1')->store('images', 'public');
                $imagepath2 = $request->file('image2')->store('images', 'public');

                $post->images()->createMany([
                    ['path' => $imagepath1],
                    ['path' => $imagepath2],
                ]);
            }

            return redirect('/posts');
        } catch (Exception $err) {
            echo "something went wrong";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('update-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if (count($post->images) > 0) {
            foreach ($post->images as $image) {
                Storage::disk('public')->delete($image->path);
                Image::findOrFail($image->id)->delete();
            }
        }
        $post->delete();
        return redirect()->back();
    }
}
