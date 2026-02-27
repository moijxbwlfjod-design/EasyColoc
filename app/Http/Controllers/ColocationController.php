<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColocationRequest;
use App\MyFunctions\SlugGenerator;
use App\Models\ColocationRole;
use Illuminate\Support\Facades\Auth;
use App\Models\ColocationMember;
use App\Models\Colocation;


class ColocationController extends Controller
{

    public function index(){
        return view('pages.colocation.create');
    }

    public function create(ColocationRequest $request){
        $user = Auth::User();
        if ($user->colocation_role_id == ColocationRole::where('name', 'owner')->value('id')) return back()->with(['error' => 'As owner you can\'t create a new colocation']);
        $validation = $request->validated();
        //$colocation = new Colocation();
        //dd(Colocation::class);
        $slug = SlugGenerator::UniqueSlug(new Colocation(), $request->title);
        $request->file('image')->move(public_path('colocations_images'), "{$slug}.png");
        $colocation = Colocation::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => "/colocations_images/{$slug}.png",
            'location' => $request->location,
            'slug' => $slug,
            'owner_id' => Auth::User()->id,
            'status' => 'active',
        ]);
        ColocationMember::create(['member_id' => $user->id, 'colocation_id' => $colocation->id]);
        $user->colocation_role_id = ColocationRole::where('name', 'owner')->value('id');
        $user->save();
        return back()->with('msg', 'Store created successfully');
    }
}
