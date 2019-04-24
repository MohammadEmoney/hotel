<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hotel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotel.create');
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
            'lat'           => 'integer',
            'long'          => 'integer',
            'description'   => 'required',
            'image'         => 'image|max:3072', //Image Maximum Size 3MB
            'video'         => 'mime:mp4,mov,ogg|max:10240', //Image Maximum Size 10MB
        ]);

        $data = [
            'name_fa'       => requset('name_fa'),
            'name_en'       => requset('name_en'),
            'slug'          => requset('slug'),
            'lat'           => requset('lat'),
            'long'          => requset('long'),
            'description'   => requset('description'),
            'image'         => $image,
            'video'         => $video,
            'area_id'       => request('area_id'),
            'city_id'       => request('city_id'),
            'country_id'    => request('country_id'),
            'attraction_id' => request('attraction_id'),
            'provider_id'   => request('provider_id'),
        ];

        Hotel::create($data);
        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('admin.hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $this->validate(request(), [
            'name_fa'       => 'required',
            'name_en'       => 'required',
            'lat'           => 'integer',
            'long'          => 'integer',
            'description'   => 'required',
            'image'         => 'image|max:3072', //Image Maximum Size 3MB
            'video'         => 'mime:mp4,mov,ogg|max:10240', //Image Maximum Size 10MB
        ]);

        $data = $request->all();
        $hotel->update($data);
        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotel.index');
    }
}
