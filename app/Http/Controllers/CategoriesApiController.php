<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesApiController extends Controller
{
    public function index()
    {
        return response()->json(['categories' => Category::all()], 200);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['category' => $category], 200);
    }
}
