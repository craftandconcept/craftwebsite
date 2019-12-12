<?php

namespace App\Http\Controllers;

use App\Collaborator;
use App\CollaboratorToImage;
use App\Image;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborators = Collaborator::all();

        return view('collaborator.index', compact('collaborators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collaborator.create');
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
            'name' => 'required|min:2|max:50',
            'last_name' => 'max:50',
            'title' => 'max:254',
        ]);
        $data = $request->all();

        $team = Collaborator::create($data);

        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/collaborator'. $team->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/collaborator'.$team->id.'/', $main_image_name);
        }

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $i_key => $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/collaborator'.$team->id.'/', $name);
                $image_url = '/images/collaborator'.$team->id.'/'. $name;
                $image = Image::create([
                    'path' => $image_url,
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : '',
                ]);

                CollaboratorToImage::create([
                    'collaborator_id' => $team->id,
                    'image_id' => $image->id
                ]);
            }
        }

        $team->update(['main_image' => $main_img_url]);
        $team->save();

        return redirect('/admin/collaborators');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collaborator = Collaborator::where('id', $id)->first();

        return view('collaborator.edit', compact('collaborator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collaborator $collaborator)
    {
        $data = $request->validate([
            'name' => 'required|min:2|max:50',
            'last_name' => 'max:50',
            'title' => 'max:254',
        ]);
        $data = $request->all();

        $collaborator->update($data);

        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/collaborator'. $collaborator->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/collaborator'.$collaborator->id.'/', $main_image_name);
        } else {
            $main_img_url = $request->isset_main_image;
        }

        foreach ($collaborator->images As $image) {
            $image->image->delete();
        }

        if($request->hasfile('image')) {
            foreach ($request->file('image') as $i_key => $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/collaborator' . $collaborator->id . '/', $name);
                $image_url = '/images/collaborator' . $collaborator->id . '/' . $name;
                $image = Image::create([
                    'path' => $image_url,
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : 0,
                ]);

                CollaboratorToImage::create([
                    'collaborator_id' => $collaborator->id,
                    'image_id' => $image->id
                ]);
            }
        }
        if ($request->isset_image) {
            if($request->photo_id){
                foreach($request->photo_id as $p_key => $photo_id){
                    $model_for_update = Image::create([
                        'path' => $request->isset_image[$p_key],
                        'full' => $request->full_image[$p_key] == 1 ? 1 : 0,
                    ]);

                    CollaboratorToImage::create([
                        'collaborator_id' => $collaborator->id,
                        'image_id' => $model_for_update->id
                    ]);
                }
            }

        }

        $collaborator->update(['main_image' => $main_img_url]);

        return redirect('/admin/collaborators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        $path= public_path().'/images/collaborator'.$collaborator->id.'/';
        $collaborator->delete();

        if (\File::exists($path)) \File::deleteDirectory($path);
        return redirect ('/admin/collaborators');
    }
}
