<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BackendSettings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    protected $hidden=['created_at' , 'updated_at'];
}
