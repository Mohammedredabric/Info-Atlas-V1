<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='countries';

    protected $fillable = [
        'name',
        'code',
        'dial_code',
        'currency_name',
        'currency_symbol',
        'currency_code',
        'slug',
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



    public function cities(){
        return $this -> hasMany('App\Models\City','country_id','id');
    }
}
