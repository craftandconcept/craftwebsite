<?php

namespace App\Http\Controllers;

use App\Creator;
use App\CreatorToImage;
use App\Image;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators = Creator::all();

        return view('creator.index', compact('creators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creator.create');
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

        $creator = Creator::create($data);

        if($request->hasfile('creator_main_image')){
            $main_image = $request->file('creator_main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/creator'. $creator->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/creator'.$creator->id.'/', $main_image_name);
        }

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $i_key => $image)
            {

                // dd($request,$request->file('image'),$request->text_image,$request->full_image);
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/creator'.$creator->id.'/', $name);
                $image_url = '/images/creator'.$creator->id.'/'. $name;
                $image = Image::create([
                    'path' => $image_url,
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : '',
                ]);

                CreatorToImage::create([
                    'creator_id' => $creator->id,
                    'image_id' => $image->id
                ]);
            }
       }

       $creator->update(['creator_main_image' => $main_img_url]);
       $creator->save();

       return redirect('/admin/creators');
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
        $creator = Creator::where('id', $id)->first();

        return view('creator.edit', compact('creator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creator $creator)
    {
        $data = $request->validate([
            'name' => 'required|min:2|max:50',
            'last_name' => 'max:50',
            'title' => 'max:254',
        ]);
        $data = $request->all();

        $creator->update($data);

        if($request->hasfile('creator_main_image')){
            $main_image = $request->file('creator_main_image');
            $main_image_name = $main_image->getClientOriginalName();
            $main_img_url = '/images/creator'. $creator->id .'/'. $main_image_name;

            $main_image->move(public_path().'/images/creator'.$creator->id.'/', $main_image_name);
        } else {
            $main_img_url = $request->isset_main_image;
        }

        foreach ($creator->images As $image) {
            $image->image->delete();
        }
        //$creator->images->delete();
      //  dd($request->all());
        if($request->hasfile('image')) {
            foreach ($request->file('image') as $i_key => $image) {

                // dd($request,$request->file('image'),$request->text_image,$request->full_image);
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/creator' . $creator->id . '/', $name);
                $image_url = '/images/creator' . $creator->id . '/' . $name;
                $image = Image::create([
                    'path' => $image_url,
                    'full' => !is_null($request->full_image[$i_key]) ? $request->full_image[$i_key] : 0,
                ]);

                CreatorToImage::create([
                    'creator_id' => $creator->id,
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

                    CreatorToImage::create([
                        'creator_id' => $creator->id,
                        'image_id' => $model_for_update->id
                    ]);
                }
            }

        }

        $creator->update(['creator_main_image' => $main_img_url]);
        $creator->save();

        return redirect('/admin/creators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $creator)
    {
        $path= public_path().'/images/creators'.$creator->id.'/';
        $creator->delete();

        if (\File::exists($path)) \File::deleteDirectory($path);
        return redirect ('/admin/creators');
    }
}
