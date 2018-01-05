<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/5/18
 * Time: 10:23 PM
 */

namespace App\Http\Middleware;

use App\Like;
use Closure;
use Auth;

class checkUnlike
{
    public function handle($request, Closure $next)
    {
        $id = $request->route()->parameter('likeId');

        $like = Like::where('id', $id)->first();

        if (Auth::user()->id != $like->user_id) {
            return redirect()->back();
        } else {
            return $next($request);
        }
    }
}