<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');

    }

    public function store() {
        //validate the request 
        $atrributes = request()->validate([
            'name' => 'required|max:255|min:4',
            'username' => 'required|max:255|min:5|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|required|max:255'
        ]);

        //store it to database with passsword hashed
        $user = User::create($atrributes);
        Auth::login($user);
        //redirect to homepage
        session()->flash('success', 'You created account successfully');
        return redirect('/');
    }
}
