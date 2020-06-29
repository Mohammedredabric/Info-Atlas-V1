<?php

namespace App\Http\Controllers;

use App\Models\BackendSettings;
use App\Models\Country;
use App\Models\FrontendSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getbacksettings()
    {
        $countries =Country::all();
        $Listsettings=BackendSettings::all();
        $settings=[];
        Foreach($Listsettings as $setting){
            $settings[$setting->type]=$setting->description;
        }
        return view('settings.back',compact(['countries','settings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setbacksettings(Request $request){
        $settting=[
            'website_title'=>$request->input('website_title'),
            'system_title'=>$request->input('system_title'),
            'system_email'=>$request->input('system_email'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'country_id'=>$request->input('country_id'),
        ];

        foreach ($settting as $key =>$value){
            $back=BackendSettings::where('type',$key)->first();
            if ($back){
                $back->description=$value;
                $back->save();
            }
            else{
                $back=new BackendSettings();
                $back->type=$key;
                $back->description=$value;
                $back->save();
            }
        }
       // Config::set('APP_NAME','infoAtlas'); // default

        $request->session()->flash('stg','Saved');
        return redirect()->route('backsettings');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getfrontsettings()
    {
        $countries =Country::all();
        $Listsettings=FrontendSettings::all();
        $settings=[];
        Foreach($Listsettings as $setting){
            $settings[$setting->type]=$setting->description;
        }
        return view('settings.front',compact(['countries','settings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setfrontsettings(Request $request){

        $settting=[
            'banner_title'=>$request->input('banner_title'),
            'banner_sub_title'=>$request->input('banner_sub_title'),
            'slogan'=>$request->input('slogan'),
            'facebook'=>$request->input('facebook'),
            'twitter'=>$request->input('twitter'),
            'about_us'=>$request->input('about_us'),
            'terms_and_condition'=>$request->input('terms_and_condition'),
            'privacy_policy'=>$request->input('privacy_policy'),
            'faq'=>$request->input('faq'),
        ];
        foreach ($settting as $key =>$value){

           if ($value !=""){
                $back=FrontendSettings::where('type',$key)->first();
                if ($back){
                    $back->description=$value;
                    $back->save();
                }
                else{
                    $back=new FrontendSettings();
                    $back->type=$key;
                    $back->description=$value;
                    $back->save();
                }
            }
        }
        $request->session()->flash('stg','Saved');
        return redirect()->route('frontsettings');

    }



}
