<?php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HotelCRUDController extends Controller
{
    use AuthorizesRequests;
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hotels'] = Hotel::orderBy('id', 'desc')->paginate(5);
        return view('hotels.index', $data);
    }

    public function create()
    {
        return view('hotels.create');
    }
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|numeric|min:0|max:5',
        ]);
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->email = $request->email;
        $hotel->address = $request->address;
        $hotel->rating = $request->rating;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $hotel->image = 'images/' . $imageName;
        }

        $hotel->save();
        return redirect()->route('hotels.index')
            ->with('success', 'Hotel has been created successfully.');
    }

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

        $this->authorize('update', $hotel);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $this->authorize('update', $hotel);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|numeric|min:0|max:5',
        ]);
        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->email = $request->email;
        $hotel->address = $request->address;
        $hotel->rating = $request->rating;


        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $hotel->image = 'images/' . $imageName;
            } else {

                return back()->with('error', 'File upload failed.');
            }
        }
        $hotel->save();
        return redirect()->route('hotels.index')
            ->with('success', 'Hotel Has Been updated successfully');
    }

    public function destroy(Hotel $hotel)
    {
        $this->authorize('delete', $hotel);
        $hotel->delete();
        return redirect()->route('hotels.index')
            ->with('success', 'Hotel has been deleted successfully');
    }
}