<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsApiController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        foreach ($teams as $key => &$team){
            foreach ($team->images as $image){
                $image->image->path;
            }
        }
        return response()->json(['teams' => $teams], 200);
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        foreach ($team->images as $image){
            $data['images'][]=$image->image->path;
        }
        return response()->json(['$team' => $team], 200);
    }
}
