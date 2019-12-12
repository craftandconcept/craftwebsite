<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creator;

class CreatorsApiController extends Controller
{
    public function index()
    {
        $creators = Creator::all();
        foreach ($creators as $key => &$creator){
            foreach ($creator->images as $image){
                $image->image->path;
            }
        }
        return response()->json(['creators' => $creators], 200);
    }

    public function show($id)
    {
        $creator = Creator::findOrFail($id);
        foreach ($creator->images as $image){
            $creator['images'][]=$image->image->path;
        }
        return response()->json(['creator' => $creator], 200);
    }
}
