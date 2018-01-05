<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/5/18
 * Time: 11:18 PM
 */

namespace App\Http\Middleware;

use Closure;
use App\Post;
use Auth;

class checkSoftDelete
{
    public function handle($request, Closure $next)
    {
        $id = $request->route()->parameter('id');

        $post = Post::where('id', $id)->first();

        if (Auth::user()->id != $post->user_id) {
            return redirect()->back();
        } else {
            return $next($request);
        }
    }
}