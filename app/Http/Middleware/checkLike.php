<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/5/18
 * Time: 10:22 PM
 */

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkLike
{
    public function handle($request, Closure $next)
    {
        $id = $request->route()->parameter('userId');

        if (Auth::user()->id != $id) {
            return redirect()->back();
        } else {
            return $next($request);
        }
    }
}