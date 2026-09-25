<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(SignInRequest $request){
        $data = $request->validated();

        if(!Auth::attempt($data,true)){
            // to remember the user

            return back()->with('error', 'Invalid credentials. Please check your email and password and try again.');
        }

        return redirect()->route('dashboard');
        // if login is successful, redirect to dashboard
    }
}
