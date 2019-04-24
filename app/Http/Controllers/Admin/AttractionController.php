<?php

namespace App\Http\Controllers\Admin;

use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attraction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attraction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name_fa'       => 'required',
            'name_en'       => 'required',
            'image'         => 'image|max:3072', //maximum size 3MB
            'video'         => 'mime:mp4,mov,ogg|max:10240', //Maximum size 10MB
            'description'   => 'required',
            'lat'           => 'required',
            'lat'           => 'required',
        ]);

        $data = [
            'name_fa'       => request('name_fa'),
            'name_en'       => request('name_en'),
            'slug'          => request('slug'),
            'image'         => $image,
            'video'         => $video,
            'description'   => request('description'),
            'lat'           => request('lat'),
            'lat'           => request('lang'),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function show(Attraction $attraction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function edit(Attraction $attraction)
    {
        return view('admin.attraction.edit', compact('attraction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attraction $attraction)
    {
        $this->validate(request(), [
            'name_fa'       => 'required',
            'name_en'       => 'required',
            'image'         => 'image|max:3072', //maximum size 3MB
            'video'         => 'mime:mp4,mov,ogg|max:10240', //Maximum size 10MB
            'description'   => 'required',
            'lat'           => 'required',
            'lat'           => 'required',
        ]);

        $data = $request->all();
        return redirect()->route('attraction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attraction $attraction)
    {
        $attraction->delete();
        return redirect()->route('attraction.index');
    }
}
