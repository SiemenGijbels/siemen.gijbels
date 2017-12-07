<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/3/17
 * Time: 2:53 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required']);

        if (Auth::attempt([
            'email' => $request->input('email'), 'password' => $request->input('password')
        ], $request->has('remember'))) {
            return redirect('/');
        }
        return redirect()->back()->with('fail', 'Authentication failed!');
    }
}

