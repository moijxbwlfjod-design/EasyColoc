<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login_ui(){
        return view('auth.login.login');
    }

    public function login(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attemp(['email' => $request->email, 'password' => $request->password])){
            $user = User::where('email', $request->email);
            Auth::login($user);
            return redirect()->view('....');
        }
        return back()-withErrors(['error' => 'User not found']);
    }
}
