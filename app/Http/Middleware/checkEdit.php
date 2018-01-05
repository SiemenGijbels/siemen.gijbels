<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/5/18
 * Time: 11:03 PM
 */

namespace App\Http\Middleware;


use App\Post;
use Closure;
use Auth;


class checkEdit
{
    public function handle($request, Closure $next)
    {
        $postId = $request->route()->parameter('id');

        $post = Post::where('id', $postId)->first();

        if (Auth::user()->id != $post->user_id) {
            return redirect()->back();
        }

        return $next($request);

    }
}