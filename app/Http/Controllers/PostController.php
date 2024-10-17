<?php

namespace App\Http\Controllers;

use App\Mail\PostUpdatedMail;
use App\Mail\welcomeMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\PostCreatedMail;
use App\Mail\PostDeletedMail;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{

    // controller middleware
    public static function middleware()
    {
        return [

            new Middleware(['auth','verified'], except: ['index']),
        ];
    }

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
    // create post
    public function store(StorePostRequest $request)
    {
        // dd($request);
        $path = null;
        if ($request->hasFile("image")) {
            $path = Storage::disk("public")->put("postImage", $request->image);
        }
        // dd($path);
        $post = Post::create([
            "user_id" => Auth::user()->id,
            "title" => $request->title,
            "body" => $request->body,
            "image" => $path,
        ]);

        Mail::to(Auth::user()->email)->send(new PostCreatedMail($post,$post->user));

        return to_route("posts.index")->with("post-create", "Post created success!");
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
        Gate::authorize("update", $post);
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    // update post
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {

            if ($request->hasFile("image")) {
                if ($post->image) {
                    Storage::disk("public")->delete($post->image);
                }
                $path = Storage::disk("public")->put("postImage", $request->image);
                $post->update([
                    "user_id" => Auth::user()->id,
                    "title" => $request->title,
                    "body" => $request->body,
                    "image" => $path,
                ]);
            } else {
                $post->update([
                    "user_id" => Auth::user()->id,
                    "title" => $request->title,
                    "body" => $request->body,
                    "image" => $post->image,
                ]);
            }
            Mail::to(Auth::user()->email)->send(new PostUpdatedMail($post,$post->user));
            return to_route("posts.index")->with("post-update", "Posts updated success!");
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
        // Gate::authorize("forceDelete",$post);
        Gate::authorize("delete", $post);


        if ($post->image) {
            Storage::disk("public")->delete($post->image);
        }

        $post->delete();

        Mail::to(Auth::user()->email)->send(new PostDeletedMail($post,$post->user));
        return to_route("posts.index")->with("post-delete", "Post delete success!");
    }

    // view all my posts
    public function myPosts()
    {
        $user = User::where("id", Auth::user()->id)->first();
        $posts = $user->posts()->paginate(5);
        return view("posts.myPosts", compact("posts"));
    }

    // user posts
    public function userPosts(User $user)
    {
        $posts = $user->posts()->latest()->paginate(5);
        return view("posts.userPosts", compact("posts", "user"));
    }

}
