<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review_comment',
        'reviewwisequality_id',
        'listing_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function listing()
    {
        return $this->belongsTo(\App\Models\Listing::class);
    }

    public function reviewWiseQuality()
    {
        return $this->belongsTo(\App\Models\ReviewQuality::class);
    }
}
