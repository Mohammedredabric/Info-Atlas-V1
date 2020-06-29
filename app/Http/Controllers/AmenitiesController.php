<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\AmenityStoreRequest;
use App\Http\Requests\AmenityUpdateRequest;
use App\Models\Amenity;
use Illuminate\Support\Str;

class AmenitiesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $amenities = Amenity::all();

        return view('amenity.index', compact('amenities'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('amenity.create');
    }

    /**
     * @param \App\Http\Requests\AmenitiesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmenityStoreRequest $request)
    {
        $amenity = Amenity::create([
            'icon_class' => $request->input("icon_class"),
            'name' => $request->input("name"),
            'slug' => Str::lower($request->input("name")),
        ]);
        $request->session()->flash('amenity', $amenity->name.'');
        return redirect()->route('amenities.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Amenity $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Amenity $amenity)
    {
        return view('amenity.show', compact('amenity'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Amenity $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amenity= Amenity::findOrfail($id);
        return view('amenity.edit', compact('amenity'));
    }

    /**
     * @param \App\Http\Requests\AmenityUpdateRequest $request
     * @param \App\Models\Amenity $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(AmenityUpdateRequest $request, $id)
    {
        $amenity= Amenity::findOrfail($id);
        $amenity->update([
            'icon_class' => $request->input("icon_class"),
            'name' => $request->input("name"),
            'slug' => Str::lower($request->input("name")),
        ]);
        $request->session()->flash('amenity', $amenity->name.'');
        return redirect()->route('amenities.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Amenity $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity= Amenity::findOrfail($id);
        $amenity->delete();
        return redirect()->route('amenities.index');
    }
}
