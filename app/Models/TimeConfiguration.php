<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeConfiguration extends Model
{

    protected $table="time_configuration";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
    ];

    public $hidden=[
        "created_at",
        "updated_at",
        "listing_id",
    ];

    public function listing(){
        return $this->hasMany(\App\Models\Listing::class);

    }

}
