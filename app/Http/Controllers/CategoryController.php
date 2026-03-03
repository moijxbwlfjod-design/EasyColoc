<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        return view('pages.categories.index');
    }

    public function create(CategoryRequest $request){
        $user = Auth::user();
        $col_id = $user->colocations[count($user->colocations) - 1]->id;
        Category::create([
            'title' => $request->title,
            'colocation_id' => $col_id
        ]);
        return redirect()->route('home.index')->with('msg', 'Category created successfully');
    }
}
