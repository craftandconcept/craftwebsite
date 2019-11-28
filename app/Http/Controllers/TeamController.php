<?php

namespace App\Http\Controllers;

use App\Image;
use App\Team;
use App\TeamToImage;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $team = Team::create($data);

        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/team'. $team->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/team'.$team->id.'/', $main_image_name);
        }

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $i_key => $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/team'.$team->id.'/', $name);
                $image_url = '/images/team'.$team->id.'/'. $name;
                $image = Image::create([
                    'path' => $image_url,
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : '',
                ]);

                TeamToImage::create([
                    'team_id' => $team->id,
                    'image_id' => $image->id
                ]);
            }
        }

        $team->update(['main_image' => $main_img_url]);
        $team->save();

        return redirect('/admin/teams');
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
        $team = Team::where('id', $id)->first();

        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $data = $request->all();

        $team->update($data);

        if($request->hasfile('main_image')){
            $main_image = $request->file('main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/team'. $team->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/team'.$team->id.'/', $main_image_name);
        } else {
            $main_img_url = $request->isset_main_image;
        }

        foreach ($team->images As $image) {
            $image->image->delete();
        }

        if($request->hasfile('image')) {
            foreach ($request->file('image') as $i_key => $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/team' . $team->id . '/', $name);
                $image_url = '/images/team' . $team->id . '/' . $name;
                $image = Image::create([
                    'path' => $image_url,
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : 0,
                ]);

                TeamToImage::create([
                    'team_id' => $team->id,
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

                    TeamToImage::create([
                        'team_id' => $team->id,
                        'image_id' => $model_for_update->id
                    ]);
                }
            }

        }

        $team->update(['main_image' => $main_img_url]);

        return redirect('/admin/teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $path= public_path().'/images/team'.$team->id.'/';
        $team->delete();

        if (\File::exists($path)) \File::deleteDirectory($path);
        return redirect ('/admin/teams');
    }
}
