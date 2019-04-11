<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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

            'name' => 'required',
            'source' => 'required',
            'description' => 'required'



        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name for your resource.',
            'source.required' => 'Please enter the URL of the resource.',
            'description.required' => 'Please write a short description of what the resource is about.',

        ];
    }
}
