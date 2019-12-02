<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collaborator;

class CollaboratorsApiController extends Controller
{
    public function index()
    {
        return response()->json(['collaborator' => Collaborator::all()], 200);
    }

    public function show($id)
    {
        $collaborator = Collaborator::findOrFail($id);
        foreach ($collaborator->images as $image){
            $data['images'][]=$image->image->path;
        }
        return response()->json(['collaborator' => $collaborator], 200);
    }
}
