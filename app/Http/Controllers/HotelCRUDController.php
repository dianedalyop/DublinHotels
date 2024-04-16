<?php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hotels'] = Hotel::orderBy('id', 'desc')->paginate(5);
        return view('hotels.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->email = $request->email;
        $hotel->address = $request->address;
        $hotel->save();
        return redirect()->route('hotels.index')
            ->with('success', 'Hotel has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->email = $request->email;
        $hotel->address = $request->address;
        $hotel->save();
        return redirect()->route('hotels.index')
            ->with('success', 'Hotel Has Been updated successfully');
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
        return redirect()->route('hotels.index')
            ->with('success', 'Hotel has been deleted successfully');
    }
}