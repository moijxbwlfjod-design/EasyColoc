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
    public function create(ColocationRequest $request){
        if (Auth::User()->colocation_role->name == 'owner') return back()->withErrors(['error' => 'As owner you can\'t create a new colocation']);
        $validation = $request->validate();
        $slug = SlugGenerator::UniqueSlug(Colocation, $request->title);
        $request->file('image')->move(public_path('colocations_images'), $slug);
        Colocation::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => public_path("/colocations/{$slug}"),
            'house_id' => $request->house_id,
            'owner_id' => $request->owner_id,
            'status' => $request->status,
        ]);
        Auth::User()->colocation_role_id = ColocationRole::where('name', 'owner')->value('id');
        return back()->with(['msg' => 'Store created successfully']);
    }
}
