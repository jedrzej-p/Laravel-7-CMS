<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostGroup;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new PostGroup;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index')->with('flash_message', 'Kategoria została dodana pomyślnie.');
    }

    public function edit($id)
    {
        $category = PostGroup::where('id',$id)->first();
        return view('admin.category.edit')->with(['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = PostGroup::where('id', $id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index')->with('flash_message', 'Zmieniono nazwę kategorii.');
    }

    public function index()
    {
        $categories = PostGroup::orderBy('name','asc')->get();
        return view('admin.category.index')->with(['categories' => $categories]);
    }

    public function destroy($id)
    {
        $category = PostGroup::where('id', $id);
        $category->delete();
        return redirect()->back();
    }
}
