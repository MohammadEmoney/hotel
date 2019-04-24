<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
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
            'description'   => 'required'
        ]);


        $data = [
            'name_fa'       => request('name_fa'),
            'name_en'       => request('name_en'),
            'slug'          => request('slug'),
            'lat'           => request('lat'),
            'long'          => request('long'),
            'country_id'    => request('country_id'),
            'description'   => request('description')
        ];

        City::create($data);
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate(request(), [
            'name_fa'       => 'required',
            'name_en'       => 'required',
            'lat'           => 'integer',
            'long'          => 'integer',
            'description'   => 'required'
        ]);

        $data = $request->all();
        $city->update($data);

        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cty.index');
    }
}
