<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 1/5/18
 * Time: 8:47 PM
 */

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->type != 1) {
            return redirect()->back();
        }

        return $next($request);
    }
}
