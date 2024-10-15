<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // post lists
    public function index()
    {
        $posts = Post::orderBy("id", "desc")->paginate(5);
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    //post create page
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "body" => $request->body,
        ]);

        return to_route("posts.index")->with("post-create","Post created success!");
    }

    /**
     * Display the specified resource.
     */
    //detail post
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // post edit
    public function edit(Post $post)
    {
        Gate::authorize("update",$post);
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {

            $post->update([
                "user_id" => Auth::user()->id,
                "title" => $request->title,
                "body" => $request->body,
            ]);
            return to_route("posts.index")->with("post-update","Posts updated success!");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    // post delete
    public function destroy(Post $post)
    {
        Gate::authorize("delete",$post);
        $post->delete();
        return to_route("posts.index")->with("post-delete","Post delete success!");
    }
}
