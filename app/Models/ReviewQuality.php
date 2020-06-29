<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewQuality extends Model
{

    protected $table='reviewwisequalities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rating_from',
        'rating_to',
        'quality',
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
        'rating_from' => 'float',
        'rating_to' => 'float',
    ];


    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }
}
