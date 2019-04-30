<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use App\Area;
use App\Provider;
use App\Attraction;

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
        $attractions = Attraction::all();
        return view('admin.hotel.create', compact('countries', 'cities', 'areas', 'providers', 'attractions'));
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
            'image'         => 'required',
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:3078', //Maximum size 3MB
            'video'         => 'mimes:mp4,mov,ogg|max:10240', //Image Maximum Size 10MB
        ]);

        if($request->hasFile('image')){
            $className = Hotel::class;
            $images = json_encode(uploadFile($request->image, $className));
        }else{
            $images = '';
        }

        if($request->hasFile('video')){
            $className = Hotel::class;
            $video = uploadVideo($request->video, $className);
        }else{
            $video = '';
        }

        if (request('provider_id')){
            foreach(request('provider_id') as $provider_id){
                //
            }
        }




        $data = [
            'name_fa'       => request('name_fa'),
            'name_en'       => request('name_en'),
            'slug'          => request('slug'),
            'lat'           => request('lat'),
            'long'          => request('long'),
            'description'   => request('description'),
            'image'         => $images,
            'video'         => $video,
            'area_id'       => request('area_id'),
            'city_id'       => request('city_id'),
            'country_id'    => request('country_id'),
            'provider_id'   => request('provider_id'),
        ];

        $hotel = Hotel::create($data);
        foreach($request->attractions_id as $attraction_id){
            $hotel->attraction()->sync($attraction_id);
        }
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
