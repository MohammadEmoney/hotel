<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use App\Area;
use App\Provider;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotel.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $areas = Area::all();
        $providers = Provider::all();
        return view('admin.hotel.create', compact('countries', 'cities', 'areas', 'providers'));
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
            'description'   => 'required',
            'image'         => 'image|max:3072', //Image Maximum Size 3MB
            'video'         => 'mime:mp4,mov,ogg|max:10240', //Image Maximum Size 10MB
        ]);

        if($request->hasFile('image')){
            $className = Attraction::class;
            $images = json_encode(uploadFile($request->image, $className));
        }
        if($request->hasFile('video')){
            $className = Attraction::class;
            $video = uploadVideo($request->video, $className);
        }

        $data = [
            'name_fa'       => requset('name_fa'),
            'name_en'       => requset('name_en'),
            'slug'          => requset('slug'),
            'lat'           => requset('lat'),
            'long'          => requset('long'),
            'description'   => requset('description'),
            'image'         => $images,
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
