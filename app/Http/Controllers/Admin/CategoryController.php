<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();
        return view('admin.category.list')->with(['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function saveNew(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');

        if($category->save()) {
            return redirect()->route('admin.category.list');
        }
        return abort(400);
    }

    public function edit(Category $category)
    {
        return view('admin.category.create')->with(['category' => $category]);
    }

    public function update(Category $category, CategoryUpdateRequest $request)
    {
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');

        if ($category->save()) {
            return redirect()->route('admin.category.list');
        }
        return redirect()->back();
    }
}
