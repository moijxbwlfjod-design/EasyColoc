<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\ColocationRole;
use App\Models\ColocationMember;

class AuthController extends Controller
{
    public function index(){
        $user = Auth::User();
        $colocation = $user->colocations[count($user->colocations) - 1];
        //$members = ColocationMember::where();
        if($colocation) return view('pages.colocation.home', compact('user', 'colocation'));
        return view('pages.colocation.home', compact('user'));
    }

    public function login_ui(){
        return view('auth.login.login');
    }

    public function login(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return view('pages.colocation.home', ['user' => $user, 'colocation' => $user->colocations[count($user->colocations) - 1]]);
            //return "Hello after login";
        }
        return back()->withErrors(['error' => 'User not found']);
    }

    public function register_ui(){
        return view('auth.register.register');
    }

    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'gender' => 'required|in:male,female'
        ]);
        if(count(User::all()) == 0) $role_id = Role::where('name', 'admin')->value('id');
        else $role_id = Role::where('name', 'user')->value('id');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role_id' => $role_id,
            'colocation_role_id' => ColocationRole::where('name', 'without colocation')->value('id')
        ]);
        Auth::login($user);
        return view('pages.colocation.home', compact('user'));
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('msg', 'You are logged out!');
    }
}
