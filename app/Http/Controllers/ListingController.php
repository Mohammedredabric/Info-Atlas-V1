<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Http\Requests\ListingUpdateRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Listing;
use App\Models\TimeConfiguration;
use App\Notifications\ListCreated;
use App\Notifications\ListPublished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ListingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::select('id','name','status','city_id')
                    ->with(['City'=>function($q){
                $q->select('cities.id','cities.name','cities.country_id')
                ->with(['country'=>function($q){
                    $q->select('countries.id','countries.name');
            }]);}])
                    ->with(['categories'=>function($q){
                        $q->select('name');
        }])
                    ->where('status','Active')
                    ->get();
        return view('listing.index', compact(['listings']));
    }

    public function claimed(){
        $listings = Listing::select('id','name','status','city_id')
            ->with(['City'=>function($q){
                $q->select('cities.id','cities.name','cities.country_id')
                    ->with(['country'=>function($q){
                        $q->select('countries.id','countries.name');
                    }]);}])
            ->with(['categories'=>function($q){
                $q->select('name');
            }])
            ->where('status','Pendig')
            ->get();

        return view('listing.claimed', compact(['listings']));
    }

    public function active($id){
        $listing=Listing::find($id);
        $listing->status="Active";
        $listing->save();
        // Notification

        Notification::send($listing , new ListPublished($listing));
        return redirect()->route('listing.index')->with('listing', $listing->name. 'Listing has Achieved!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories=Category::all();
        $cities=City::all();
        $amenities = Amenity::all();

        return view('listing.create' , compact(['categories','cities','amenities']));
    }

    /**
     * @param \App\Http\Requests\ListingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListingStoreRequest $request)
    {
        $listing = new Listing();
        $listing->code = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 32); // 32 characters, without /=+
        $listing->name=$request->input('name');
        $listing->description=$request->input('description');
        $listing->video_url=$request->input('video_url');
        $listing->video_provider='youtube';
        $listing->adress=$request->input('adress');
        $listing->email=$request->input('email');
        $listing->phone=$request->input('phone');
        $listing->website=$request->input('website');
        $listing->latitude=$request->input('latitude');
        $listing->longitude=$request->input('longitude');
        $listing->listing_type=$request->input('listing_type');
        $listing->city_id=$request->input('city');
        $listing->seo_meta_tags="Tag";
        $listing->tag="Tag";
        $listing->social=$request->input('social');
        $listing->user_id=auth()->id();
        $listing->listing_thumbnail=$this->SaveImage($request->file('listing_thumbnail'),'listing');
        $listing->listing_cover=$this->SaveImage($request->file('listing_cover'),'listing');
        $listing->photos=$this->SaveImage($request->file('Gallery'),'listing');
        $listing->status="Pendig";
        $listing->save();
        //
        $listing->amenities()->sync($request->input('amenities'));
        //
        $listing->categories()->sync($request->input('category'));
        //
        $timeConfiguration =new TimeConfiguration();
        $timeConfiguration->listing_id=$listing->id;
        $timeConfiguration->saturday=$request->input('time_configuration.SaturdayOpening').'-'.$request->input('time_configuration.SaturdayClosing');
        $timeConfiguration->sunday=$request->input('time_configuration.SundayOpening').'-'.$request->input('time_configuration.SundayClosing');
        $timeConfiguration->monday=$request->input('time_configuration.MondayOpening').'-'.$request->input('time_configuration.MondayClosing');
        $timeConfiguration->tuesday=$request->input('time_configuration.TuesdayOpening').'-'.$request->input('time_configuration.TuesdayClosing');
        $timeConfiguration->wednesday=$request->input('time_configuration.WednesdayOpening').'-'.$request->input('time_configuration.WednesdayClosing');
        $timeConfiguration->thursday=$request->input('time_configuration.ThursdayOpening').'-'.$request->input('time_configuration.ThursdayClosing');
        $timeConfiguration->friday=$request->input('time_configuration.FridayOpening').'-'.$request->input('time_configuration.FridayOpening');
        $timeConfiguration->save();
        //
        $request->session()->flash('listing', $listing->name);
        // Notification

        Notification::send($listing , new ListCreated($listing));

        return redirect()->route('listing.index');
    }

    public function SaveImage($photo,$folder){
        $file_extension= $photo->getClientOriginalExtension();
        $file_name=time().'.'.$file_extension;
        $path=$folder;
        $photo->move($path,$file_name);
        return $file_name;
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, Listing $listing)
    {
        return view('listing.show', compact('listing'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $listing=Listing::select()-> with(['time'=>function($q){
            $q->select('time_configuration.*');
        }])->where('id',$id)->with(['categories'=>function($q){
            $q->select('categories.id');
        }])->with(['amenities'=>function($q){
            $q->select('amenities.id');
        }])->first();
        $categories=Category::all();
        $cities=City::all();
        $amenities = Amenity::all();



        return view('listing.edit', compact(['categories','cities','amenities','listing']));
    }

    /**
     * @param \App\Http\Requests\ListingUpdateRequest $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    function checkIfLinkyouTube($url){
        $rx = '~
                ^(?:https?://)?              # Optional protocol
                 (?:www\.)?                  # Optional subdomain
                 (?:youtube\.com|youtu\.be)  # Mandatory domain name
                 /watch\?v=([^&]+)           # URI with video id as capture group 1
                 ~x';
        $has_match = preg_match($rx,  $url , $matches);
        if(isset($matches[1]) && $matches[1] != ''){
            return true;
        }else{
            return false;
        }
    }


    public function update(ListingUpdateRequest $request,$id)
    {
        $listing = Listing::Find($id);
        $listing->name=$request->input('name');
        $listing->description=$request->input('description');
        $listing->video_url=$request->input('video_url');
        $listing->video_provider='youtube';
        $listing->adress=$request->input('adress');
        $listing->email=$request->input('email');
        $listing->phone=$request->input('phone');
        $listing->website=$request->input('website');
        $listing->latitude=$request->input('latitude');
        $listing->longitude=$request->input('longitude');
        $listing->listing_type=$request->input('listing_type');
        $listing->city_id=$request->input('city');
        $listing->seo_meta_tags="Tag";
        $listing->tag="Tag";
        $listing->social=$request->input('social');
        if ($request->hasFile('listing_thumbnail'))
            $listing->listing_thumbnail=$this->SaveImage($request->file('listing_thumbnail'),'listing');
        if ($request->hasFile('listing_cover'))
            $listing->listing_cover=$this->SaveImage($request->file('listing_cover'),'listing');
        if ($request->hasFile('Gallery'))
            $listing->photos=$this->SaveImage($request->file('Gallery'),'listing');
        $listing->status="Active";
        $listing->save();
        //
        $listing->amenities()->sync($request->input('amenities'));
        //
        $listing->categories()->sync($request->input('category'));
        //

        $timeConfiguration =TimeConfiguration::where('listing_id',$listing->id)->first();
        $timeConfiguration->saturday=$request->input('time_configuration.saturdayOpening').'-'.$request->input('time_configuration.saturdayClosing');
        $timeConfiguration->sunday=$request->input('time_configuration.sundayOpening').'-'.$request->input('time_configuration.sundayClosing');
        $timeConfiguration->monday=$request->input('time_configuration.mondayOpening').'-'.$request->input('time_configuration.mondayClosing');
        $timeConfiguration->tuesday=$request->input('time_configuration.tuesdayOpening').'-'.$request->input('time_configuration.tuesdayClosing');
        $timeConfiguration->wednesday=$request->input('time_configuration.wednesdayOpening').'-'.$request->input('time_configuration.wednesdayClosing');
        $timeConfiguration->thursday=$request->input('time_configuration.thursdayOpening').'-'.$request->input('time_configuration.thursdayClosing');
        $timeConfiguration->friday=$request->input('time_configuration.fridayOpening').'-'.$request->input('time_configuration.fridayOpening');
        $timeConfiguration->save();


        $request->session()->flash('listing', $listing->name);
        return redirect()->route('listing.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $listing = Listing::find($id);
        $listing->delete();
        $request->session()->flash('listing', $listing->name.' Deleted');
        return redirect()->route('listing.index');
    }
}
