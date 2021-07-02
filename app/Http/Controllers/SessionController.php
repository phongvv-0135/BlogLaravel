<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{

    public function create() {
        return view('session.login');
    }

    public function store() {
        //validate request
        $atributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        //attempt login
       if (! Auth::attempt($atributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        
        session()->regenerate();
        return redirect('/')->with([
            'success' => 'Welcome back'
        ]);

        //if false throw authenticateExeption
    }

    public function destroy() {
        //log out
        Auth::logout();
        //redirect to home page
        return redirect('/')->with([
            'success' => 'Good Bye'
        ]);
    }
}
