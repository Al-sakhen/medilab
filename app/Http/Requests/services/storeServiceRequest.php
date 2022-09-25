<?php

namespace App\Http\Requests\services;

use Illuminate\Foundation\Http\FormRequest;

class storeServiceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => ['required' , 'string' , 'min:3' , 'max:50'],
            'description'   => ['required' , 'string' , 'min:3' , 'max:70'],
            'image'         => ['required' , 'image', 'mimes:png,jpg,svg,gpig']
        ];
    }


    // public function messages()
    // {
    //     return [
    //         'name.required' => 'test test test',
    //         'name.string'   => 'The name must be astring',
    //     ];
    // }
}
