<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creator;

class CreatorsApiController extends Controller
{
    public function index()
    {
        return response()->json(['creators' => Creator::all()], 200);
    }

    public function show($id)
    {
        $creator = Creator::findOrFail($id);
        foreach ($creator->images as $image){
            $data['images'][]=$image->image->path;
        }
        return response()->json(['creator' => $creator], 200);
    }
}
