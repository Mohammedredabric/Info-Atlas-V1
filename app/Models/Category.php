<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parebt',
        'icon_class',
        'name',
        'slug',
        'thumbnail',
        'created_at',
        'updated_at',
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'pivot',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];




    public function listings()
    {
        return $this->belongsToMany(\App\Models\Listing::class,'category_listing');
    }
}
