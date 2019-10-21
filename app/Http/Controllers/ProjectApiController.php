<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectCollection;

class ProjectApiController extends Controller
{
    //
    public function index(){
        return new ProjectCollection(Project::all());
    }

    public function projectfilter(Request $request){
        
        if($request->category && $request->country){
            $categories = Category::find($request->category);
            $projects = $categories->projects->where('country_id',$request->country);                           
        }elseif($request->category){                   
            $categories = Category::find($request->category);
            $projects = $categories->projects;
        }elseif($request->country){
            $projects = new ProjectCollection(Project::all()->where('country_id',$request->country));  
        }else{
            $projects= new ProjectCollection(Project::all());
        }
        return new ProjectCollection($projects);
    }
}
