<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function index(){
        return view('pages.invitation.index');
    }

    public function create(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
        ]);
        DB::table('tokens')->insert([
            'token' => Str::random(60),
            'email' => $request->email
        ]);
        return redirect()->back()->with('msg','invitation sent successfully');
    }
}
