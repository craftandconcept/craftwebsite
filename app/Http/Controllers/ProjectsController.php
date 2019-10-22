<?php

namespace App\Http\Controllers;

use App\Project;
use App\Country;
use App\Creator;
use App\Category;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;

use Illuminate\Http\Request;

class ProjectsController extends Controller
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
        $projects = Project::all();
        $countries = Country::all();

        return view('admin.project_index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $countries = Country::all();       
        $creators = Creator::all();       
        $categories = Category::all();       
        
        return view('admin.project_create', compact('countries','creators','categories'));
    }

    /**
     * 
     * 
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\DB::table('projects')->latest()->first()){
            $last = \DB::table('projects')->latest()->first()->id + 1;
        }else{
            $last=0;
        }
        
        // dd($last->id);
        if($request->hasfile('image'))
        {
            
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/project'.$last.'/', $name); 
                $data[] = $name;  
            }
        }
        
        $project = Project::create([
            'name' => request('name'),
            'country_id' => request('country'),
            'image' => json_encode($data),
            'creator_id' => request('creator'),
        ]);

        if($request->input('categories')){
            $project->categories()->attach($request->input('categories'));
        }

        
        return redirect('/admin/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // 
        return view('admin.project_show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $countries = Country::all();       
        $creators = Creator::all();       
        $categories = Category::all();   
        
        return view('admin.project_edit', compact('project','countries','creators','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if($request->hasfile('image'))
        {
            
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/project'.$project->id.'/', $name);  
                $data[] = $name;  
            }
        }

        $project->update([
            'name' => request('name'),
            'country_id' => request('country'),
            'image' => json_encode($data),
            'creator_id' => request('creator'),
        ]);
        $project->categories()->detach();
        if($request->input('categories')){
            $project->categories()->attach($request->input('categories'));
        }

        return redirect('/admin/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->categories()->detach();
        $project->delete();
        return redirect ('/admin/projects');
    }
}
