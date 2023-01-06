<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts->loadMissing(['writer:id,username', 'comments:id,post_id,user_id,comments_content,created_at']));
    }

    public function show($id)
    {
        $post = Post::with('writer:id,username')->findOrFail($id);

        return new PostResource($post);
    }

    public function store(PostRequest $request)
    {

        if ($request->file){
            $imageName  = $request->file->getClientOriginalName();
            $fileName   = date_format(now(), "YmdHis") . mt_rand(1, 1000) . $imageName;
            $extension  = $request->file->extension();

            Storage::putFileAs('image', $request->file, $fileName.'.'.$extension);
            $request['image'] = $fileName.'.'.$extension;
        }

        $request['author'] = Auth::user()->id;
        $post = Post::create($request->all());

        return new PostResource($post->loadMissing(['writer:id,username']));
    }

    public function update(PostRequest $request, $id)
    {

        $post = Post::findOrFail($id);

        if ($request->file){
            if ($post->image){
                Storage::delete("image/".$post->image);
            }

            $imageName  = $request->file->getClientOriginalName();
            $fileName   = date_format(now(), "YmdHis") . mt_rand(1, 1000) . $imageName;
            $extension  = $request->file->extension();

            Storage::putFileAs('image', $request->file, $fileName.'.'.$extension);
            $request['image'] = $fileName.'.'.$extension;
        }

        $post->update($request->all());

        return new PostResource($post->loadMissing('writer:id,username'));
    }

    public function destroy($id)
    {

        $post = Post::findOrFail($id);

        if($post->image) {
            Storage::delete("image/".$post->image);
        }

        $post->delete();

        return new PostResource($post->loadMissing('writer:id,username'));
    }
}
