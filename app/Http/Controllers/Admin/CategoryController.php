<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        
        $rules = [
            'name' => 'required',
            'user_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        Category::create($data);
        Session::flash('created_category', 'Category has been created');
        return redirect('/admin/categories');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required',
            'user_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $category->slug = strtolower($request->name);

        if($category->isClean()) {
            Session::flash('nothing-changed', 'Nothing Changed');
        }else {
            $category->save();
            Session::flash('updated_category', 'Category has been updated');
            return redirect('/admin/categories');
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('deleted_category', 'Category has been deleted');
        return redirect('/admin/categories');
    }
}
