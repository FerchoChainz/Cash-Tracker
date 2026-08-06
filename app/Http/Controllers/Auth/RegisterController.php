<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // Handle the registration logic here
        $name = $request->input('name');
        $email = $request->input('email');


        return "Hola: $name, tu email es: $email";
    }
}
