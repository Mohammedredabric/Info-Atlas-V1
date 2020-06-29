<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Listing;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listings= Listing::all()->Count();
        $categories= Category::all()->Count();
        $users= User::all()->Count();
        $cities=City::all()->count();
        return view('home',['listings'=>$listings,'categories'=>$categories,'user'=>$users,'cities'=>$cities]);
    }
}
