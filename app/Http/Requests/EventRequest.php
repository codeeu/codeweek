<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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

            'title' => 'required',
            'description' => 'required',
            'organizer' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'audience' => 'required',
            'theme' => 'required',
            'country_iso' => 'required',
            'user_email' => 'required',
            'organizer_type' => 'required',


        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter a title for your event.',
            'description.required' => 'Please write a short description of what the event is about.',
            'organizer.required' => 'Please enter an organizer.',
            'location.required' => 'Please enter a location.',
            'start_date.required' => 'Please enter a valid date and time (example: 2014-10-22 18:00).',
            'end_date.required' => 'Please enter a valid date and time (example: 2014-10-22 18:00).',
            'audience.required' => 'If unsure, choose Other and provide more information in the description.',
            'theme.required' => 'If unsure, choose Other and provide more information in the description.',
            'country.required' => 'The event\'s location should be in Europe.',

            'user_email.required' => 'Please enter a valid email address.',
        ];
    }
}
