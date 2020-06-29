<?php

namespace App\Models;

use App\TimeConfiguration;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'photos',
        'video_url',
        'video_provider',
        'tag',
        'adress',
        'email',
        'phone',
        'website',
        'social',
        'latitude',
        'longitude',
        'status',
        'listing_type',
        'listing_thumbnail',
        'listing_cover',
        'seo_meta_tags',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'photos' => 'array',
        'social' => 'array',
    ];



    public $hidden=[
        'pivot',
        "created_at",
        "updated_at"
    ];

    ##################### Relations Start ############################
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function city(){
        return $this -> belongsTo(\App\Models\City::class,'city_id');
    }

    public function time(){
        return $this -> hasOne(\App\Models\TimeConfiguration::class,'listing_id','id',"time_configuration");
    }

    public function reviews(){
        return $this -> hasMany(\App\Models\Review::class);
    }

    public function amenities(){
        return $this->belongsToMany(\App\Models\Amenity::class,'amenity_listing');
    }

    public function categories(){
        return $this->belongsToMany(\App\Models\Category::class,'category_listing');
    }
    ##################### Relations End ############################

}
