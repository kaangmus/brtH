<?php

namespace App\Http\Controllers\Reporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:reporter')->except(['logout']);
    }
    public function form()
    {
        return view('reporter.reporter-login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:4'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];
        // Attempt to log the user in
        if (Auth::guard('reporter')->attempt($credential, false)){
        // If login succesful, then redirect to their intended location
            return redirect()->intended(route('reporter.home'));
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('reporter')->logout();
        return redirect(route('reporter.login'));
    }
}
