<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index($page = null)
    {
        $posts = Post::with('user')->latest()->paginate(5);
        return view('posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content' => 'required|string|max:255|min:10',
        ], [
            'content.required' => "write something bro",
            "content.max" => "YOU MUSN'T WRITE MORE THAN 255 CHAR!",
            "content.min" => "Too Small to post, say more",
        ]);

        auth()->user()->post()->create($validate);

        return redirect('/posts')->with('success', 'You Added a Textyy');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $keyword['keyword'] = $_GET['keyword'] ?? "";
        $posts = Post::with('user')->latest()->where("content", "like", "%" . $keyword['keyword'] . "%")->paginate(5)->withQueryString();
        ;
        return view('search', ['results' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize("update", $post);

        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize("update", $post);
        $validated = $request->validate([
            'content' => 'required|string|max:255|min:10',
        ], [
            'content.required' => "write something bro",
            "content.max" => "YOU MUSN'T WRITE MORE THAN 255 CHAR!",
            "content.min" => "Too Small to post, say more",
        ]);

        $post->update($validated);

        return redirect('/posts')->with('success', 'Your textyy have been updates');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize("delete", $post);

        $post->delete();

        return redirect('/posts')->with('success', 'Your textyy have been deleted');
    }
}
