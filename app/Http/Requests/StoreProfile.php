<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'image' => 'required|max:255',
            'description' => 'required'
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'A first name is required',
            'first_name.max' => 'first name too long, max 255 characters',
            'last_name.required'  => 'A last name is required',
            'last_name.max' => 'last name too long, max 255 characters',
            'image.required'  => 'A photo is required',
            'image.max' => 'photo too long, max 255 characters',
            'description.required'  => 'A description is required',
        ];
    }
}
