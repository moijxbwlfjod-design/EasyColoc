<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColocationRequest;
use App\MyFunctions\SlugGenerator;
use App\Models\Colocation;

class ColocationController extends Controller
{
    public function create(ColocationRequest $request){
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
        return back()->with(['msg' => 'Store created successfully']);
    }
}
