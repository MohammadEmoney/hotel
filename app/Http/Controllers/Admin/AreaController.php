<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.area.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(requset(), [
            'name_fa'       => 'required',
            'name_en'       => 'required|regex:/^[a-zA-Z]+$/u',
            'city_id'       => 'required',
            'description'   => 'required'
        ]);

        $data = [
            'name_fa'       => request("name_fa"),
            'name_en'       => request('name_en'),
            'description'   => request('desription'),
            'city_id'       => request('city_id'),
        ];

        Area::create($data);
        return redirect()->route('area.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('admin.area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $this->validate(requset(), [
            'name_fa'       => 'required',
            'name_en'       => 'required|regex:/^[a-zA-Z]+$/u',
            'city_id'       => 'required',
            'description'   => 'required'
        ]);
        $data = request()->all();
        $area->update($data);
        return redirect()->route('area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('area.index');
    }
}
