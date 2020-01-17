<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category_index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2|max:254|unique:categories,category_name',
        ]);

        $category = Category::create([
            'category_name' => request('name')
        ]);
        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/category'. $category->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/category'.$category->id.'/', $main_image_name);
            $category->update(['image' => $main_img_url]);
            $category->save();
        }

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('admin.category_show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|min:2|max:254',
        ]);
        $category->update([
            'category_name' => request('name')
        ]);
        if($request->hasfile('main_image')){
            $path= public_path().'/images/category'.$category->id.'/';
            if (\File::exists($path)) \File::deleteDirectory($path);

            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/collaborator'. $category->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/collaborator'.$category->id.'/', $main_image_name);
            $category->update(['image' => $main_img_url]);
            $category->save();
        }
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect ('/admin/categories');
    }
}
