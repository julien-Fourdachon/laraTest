<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Define model properties
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'description'      
    ];

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'fisrt_name' => 'First name',
            'last_name' => 'Last name',
            'image' => 'Image',
            'description' => 'Description'
        ];
    }
}
