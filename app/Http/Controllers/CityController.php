<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use  App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* $city=City::with('country')->find(6);
        $country=Country::with(['cities'=>function($q){
            $q->where('id', 1);
        }])->find(73);
        return $city ;
       */
        $cities=City::all();
        return view('city.index', compact('cities'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $countries=Country::all();
        return view('city.create',compact('countries'));
    }

    /**
     * @param \App\Http\Requests\CityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        $city = City::create([
            'name' => $request->name,
            'slug' =>  strtolower($request->name),
            'country_id' =>  $request->country_id,
        ]);
        $request->session()->flash('city', $city->name.'');

        return redirect()->route('city.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, City $city)
    {
        return view('city.show', compact('city'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=City::findOrfail($id);
        $countries=Country::all();
        return view('city.edit', compact(['city','countries']));
    }

    /**
     * @param \App\Http\Requests\CityUpdateRequest $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest$request,$id)
    {
        $city=City::findOrfail($id);

        $city->name=$request->input('name');
        $city->slug=Str::lower($request->input('name'));
        $city->country_id= $request->input('country_id');
        $city->save();
        $request->session()->flash('city', $city->name.'');
        return redirect()->route('city.index');


    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, City $city)
    {
        $city->delete();

        return redirect()->route('city.index');
    }
}
