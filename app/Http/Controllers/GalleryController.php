<?php

namespace App\Http\Controllers;

use App\ContentGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (RequestFacade::isMethod('post')) {
            ContentGallery::truncate();
            $this->store($request);
        }

        $galleryItems = ContentGallery::orderBy('sort')->get();
        if (empty($galleryItems)) {
            return redirect()->route('gallery.create');
        }

        return view('gallery.edit', compact('galleryItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->gallery) {
            $data = $request->gallery;
            foreach ($data as $key => &$item) {
                if (array_key_exists('image', $item)) {
                    $main_image = $item['image'];
                    $main_image_name = $main_image->getClientOriginalName();
                    $main_img_url = '/images/gallery/'. $main_image_name;
                    $main_image->move(public_path().'/images/gallery/', $main_image_name);
                    $item['path'] = $main_img_url;
                }

                ContentGallery::create($item);
            }

            Session::flash('success', 'Saved successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        ContentGallery::truncate();

        return redirect()->route('gallery.create');
    }

    public function getGallery()
    {
        return response()->json(ContentGallery::all());
    }
}
