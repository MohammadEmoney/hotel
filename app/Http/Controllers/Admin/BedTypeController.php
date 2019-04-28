<?php

namespace App\Http\Controllers\Admin;

use App\BedType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bedTypes = BedType::all();
        return view('admin.bedtype.index', compact('bedTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bedtype.create');
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
            'type' => 'required'
        ]);

        BedType::create([
            'type' => request('type')
        ]);
        return redirect()->route('bed-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function show(BedType $bedType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function edit(BedType $bedType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BedType $bedType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedType $bedType)
    {
        //
    }
}
