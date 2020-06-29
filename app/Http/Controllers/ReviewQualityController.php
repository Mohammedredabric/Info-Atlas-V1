<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewQualityRequest;
use App\Models\ReviewQuality;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

class ReviewQualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reviewwisequalities=ReviewQuality::all();
        return view('quality.index', compact('reviewwisequalities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('quality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewQualityRequest $request)
    {
        $ReviewQuality=ReviewQuality::Create($request->all());
        $request->session()->flash('quality', $ReviewQuality->quality.'');
        return redirect()->route('quality.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewQuality  $reviewQuality
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewQuality $reviewQuality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
       $quality = ReviewQuality::findOrFail($id);
      return view('quality.edit',compact('quality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReviewQuality  $reviewQuality
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewQualityRequest $request,$id)
    {

        $reviewQuality=ReviewQuality::findorfail($id);
        $reviewQuality->quality = $request->quality;
        $reviewQuality->rating_from =$request->rating_from;
        $reviewQuality->rating_to= $request->rating_to;
      $reviewQuality->save();
        $request->session()->flash('quality', $reviewQuality->quality.'');
        return redirect()->route('quality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReviewQuality  $reviewQuality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ReviewQuality=ReviewQuality::findORfail($id);
        $ReviewQuality->delete();
        return redirect()->route('quality.index');
    }
}
