<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColocationRequest;
use App\MyFunctions\SlugGenerator;
use App\Models\ColocationRole;
use Illuminate\Support\Facades\Auth;
use App\Models\ColocationMember;
use App\Models\Colocation;
use Illuminate\Support\Facades\DB;


class ColocationController extends Controller
{

    public function index(){
        return view('pages.colocation.create');
    }

    public function create(ColocationRequest $request){
        $user = Auth::User();
        $col_role_id = ColocationRole::where('name', 'owner')->value('id');
        if ($user->colocation_role_id == $col_role_id) return back()->with(['error' => 'As owner you can\'t create a new colocation']);
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
        DB::table('colocation_members')->insert([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'colocation_role_id' => $col_role_id,
        ]);
        $user->colocation_role_id = ColocationRole::where('name', 'owner')->value('id');
        $user->save();
        return back()->with('msg', 'Colocation created successfully');
    }
}
