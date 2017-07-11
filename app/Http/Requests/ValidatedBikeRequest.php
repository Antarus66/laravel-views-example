<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatedBikeRequest extends FormRequest
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
            'model'       => 'required|min:2|max:255',
            'description' => 'required|min:10|max:512',
            'photo'       => 'required|url',
            'in_stock'    => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'photo.url'        => 'Are you sure this is a link?!',
            'description.min'  => 'Just describe how awesome this bike is!'
        ];
    }
}
