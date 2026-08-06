<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(SignupRequest $request){
        // Handle the registration logic here


        // Second params is for custom error messages
        $data = $request->validated();

        dd($data);

    }
}
