<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('pages.categories.index');
    }

    public function create(CategoryRequest $request){
        $validation = $request->validated();
        Category::create([
            'title' => $request->title
        ]);
        return redirect()->route('home.index')->with('msg', 'Category created successfully');
    }
}
