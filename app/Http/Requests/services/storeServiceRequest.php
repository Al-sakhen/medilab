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
            'icon_id'       => ['required']
        ];
    }


    public function messages()
    {
        return [
            'icon_id.required' => 'The icon filed is required',
        ];
    }
}
