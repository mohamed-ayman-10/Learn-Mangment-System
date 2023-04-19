<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    public function login(Request $request)
    {
        try {

            if (auth()->guard($request->type == 'admin' ? 'web' : $request->type)->attempt($request->only('email', 'password'))) {
                if ($request->type == 'student') {
                    return redirect(RouteServiceProvider::STUDENT);
                } elseif ($request->type == 'teacher') {
                    return redirect(RouteServiceProvider::TEACHER);
                } elseif ($request->type == 'guardian') {
                    return redirect(RouteServiceProvider::GUARDIAN);
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
            } else {
                return back();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function logout($type)
    {
        // return $type;
        Auth::guard($type)->logout();
        return redirect('/');
    }
}
