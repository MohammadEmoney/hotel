<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BedType;
use App\RoomType;
use App\Hotel;
use App\Rate;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hotel $hotel)
    {
        $rooms = Room::all();
        return view('admin.room.index', compact('rooms', 'hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hotel $hotel)
    {
        $bedTypes = BedType::all();
        $roomTypes = RoomType::all();
        $rates = Rate::all();
        return view('admin.room.create', compact('roomTypes', 'bedTypes', 'hotel', 'rates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hotel $hotel)
    {
        $this->validate(request(), [
            'type'      => 'requierd',
            'capacity'  => 'required'
        ]);

        $data = [
            'hotel_id'  => $hotel->id,
            'type'      => request('type'),
            'capacity'  => request('capacity'),
            'currency'  => request('currency'),
            'price'     => request('price')
        ];

        Room::create($data);
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.room.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index');
    }
}
