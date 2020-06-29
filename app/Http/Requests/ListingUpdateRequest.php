<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'category'=>'required|array|min:1',
            // 'photos' => 'required|json',
            'video_url' => 'required|string',
            // 'video_provider' => 'required|string',
            // 'tag' => 'required|string',
            'adress' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'website' => 'required|string',
            'social' => 'required|array|min:1',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            //'status' => 'required|string',
            'listing_type' => 'required',
            'listing_thumbnail' => 'image',
            'listing_cover' => 'image',
        ];
    }
}
