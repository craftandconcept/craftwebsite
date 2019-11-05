<?php

namespace App\Http\Controllers;

use App\Project;
use App\Country;
use App\Creator;
use App\Photo;
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

        $validdata = $request->validate([
            'name' => 'required|min:2',
            'country' => 'required',
            'main_image' => 'required',
            'creator' => 'required',
            'collaborators' => 'required',
            'function' => 'required',
            'size' => 'required',
            'status' => 'required',
            'photos_by' => 'required',
        ]);
        
        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/project'.$last.'/'. $main_image_name;
            
            $main_image->move(public_path().'/images/project'.$last.'/', $main_image_name);
        }

        
        
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $i_key => $image)
            {
                
                // dd($request,$request->file('image'),$request->text_image,$request->full_image);
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/project'.$last.'/', $name);
                $image_url = '/images/project'.$last.'/'. $name;
                Photo::create([
                    'project_id' => $last,
                    'img' => $image_url,
                    'text' => !is_null($request->text_image[$i_key]) ? $request->text_image[$i_key] : '',
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : '',
                ]);
            }
        }


        $project = Project::create([
            'name' => request('name'),
            'country_id' => request('country'),
            'main_image' => $main_img_url,
            'main_text' => request('main_text'),
            'creator_id' => request('creator'),
            'collaborators' => request('collaborators'),
            'function' => request('function'),
            'size' => request('size'),
            'status' => request('status'),
            'photos_by' => request('photos_by'),
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

        $validdata = $request->validate([
            'name' => 'required|min:2',
            'country' => 'required',
            'creator' => 'required',
            'collaborators' => 'required',
            'function' => 'required',
            'size' => 'required',
            'status' => 'required',
            'photos_by' => 'required',
        ]);
        
        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/project'.$project->id.'/'. $main_image_name;
            $main_image->move(public_path().'/images/project'.$project->id.'/', $main_image_name);
        }else{
            $main_img_url = $request->isset_main_image;
        }

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $i_key => $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/project'.$project->id.'/', $name);
                $image_url = '/images/project'.$project->id.'/'. $name;
                Photo::create([
                    'project_id' => $project->id,
                    'img' => $image_url,
                    'text' => !is_null($request->text_image[$i_key]) ? $request->text_image[$i_key] : '',
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : '',
                ]);
            }
        }

        if($request->photo_id){
            foreach($request->photo_id as $p_key => $photo_id){
                $model_for_update = Photo::where('id',$photo_id);
                $model_for_update->update([
                    'img' => $request->isset_image[$p_key],
                    'text' => !is_null($request->text_image[$p_key]) ? $request->text_image[$p_key] : '',
                    'full' => !is_null($request->full_image[$p_key]) ? $request->full_image[$p_key] : '',
                ]);
            }
        }
        

        $project->update([
            'name' => request('name'),
            'country_id' => request('country'),
            'main_image' => $main_img_url,
            'main_text' => request('main_text'),
            'creator_id' => request('creator'),
            'collaborators' => request('collaborators'),
            'function' => request('function'),
            'size' => request('size'),
            'status' => request('status'),
            'photos_by' => request('photos_by'),
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
        $path= public_path().'/images/project'.$project->id.'/';
        if (\File::exists($path)) \File::deleteDirectory($path);
        return redirect ('/admin/projects');
    }
}
