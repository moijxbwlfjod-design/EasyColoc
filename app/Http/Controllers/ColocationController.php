<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColocationRequest;
use App\MyFunctions\SlugGenerator;
use App\Models\Colocation;
use App\Models\ColocationRole;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{

    public function index(){
        return view('pages.colocation.create');
    }

    public function create(ColocationRequest $request){
        //dd(Auth::user()->colocation_role_id);
        $user = Auth::User();
        if ($user->colocation_role_id == ColocationRole::where('name', 'owner')->value('id')) return back()->with(['error' => 'As owner you can\'t create a new colocation']);
        $validation = $request->validated();
        $colocation = new Colocation();
        $slug = SlugGenerator::UniqueSlug($colocation, $request->title);
        $request->file('image')->move(public_path('colocations_images'), "{$slug}.png");
        $colocation::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => public_path("/colocations/{$slug}"),
            'location' => $request->location,
            'slug' => $slug,
            'owner_id' => Auth::User()->id,
            'status' => 'active',
        ]);
        $user->colocation_role_id = ColocationRole::where('name', 'owner')->value('id');
        $user->save();
        return back()->with('msg', 'Store created successfully');
    }
}
