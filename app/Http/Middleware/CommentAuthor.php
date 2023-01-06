<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Http\Request;

class CommentAuthor
{
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->user()->id;
        $comment = Comment::findOrFail($request->id);

        if ($comment->user_id != $user_id){
            return response()->json(['message' => 'Data not found'], 404);
        }

        return $next($request);
    }
}
