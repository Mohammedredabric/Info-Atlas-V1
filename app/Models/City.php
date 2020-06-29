<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='cities';

    protected $fillable = [
        'name',
        'slug',
        'country_id',
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function country(){
        return $this -> belongsTo('App\Models\Country','country_id','id');
    }
    public function listings(){
        return $this -> hasMany(\App\Models\Listing::class);
    }
}
