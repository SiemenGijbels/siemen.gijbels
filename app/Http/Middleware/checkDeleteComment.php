<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/5/18
 * Time: 8:55 PM
 */

namespace App\Http\Middleware;

use App\Comment;
use App\Post;
use Closure;
use Auth;

class checkDeleteComment
{
    public function handle($request, Closure $next)
    {
       $commentId = $request->route()->parameter('commentId');

       $comment = Comment::where('id', $commentId)->first();

        if (Auth::user()->id != $comment->user_id) {
            return redirect()->back();
        }

        return $next($request);

    }
}