<?php

namespace App\Http\Requests;

use App\Rules\validAudience;
use App\Rules\validTheme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        //dd(Lang::get('base.languages'));
        //$languages = array_keys(Lang::get('base.languages'));
        $languages = config('app.locales');

        return [
            'activity_type' => 'required',
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'organizer' => 'required',
            'duration' => 'required',
            'location' => 'required_unless:activity_type,open-online,invite-online',
            'event_url' => 'required_if:activity_type,open-online,invite-online',
            'language'   => ['required', 'array'],
            'language.*' => ['required', Rule::in($languages)],
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'audience' => ['required', new ValidAudience],
            'theme' => ['required', new ValidTheme],
            'participants_count' => 'required',
            'ages' => 'required',
            'is_extracurricular_event' => 'required|boolean',
            'country_iso' => 'required|exists:countries,iso',
            'user_email' => 'required',
            'organizer_type' => 'required',
            'privacy' => 'required',
            'leading_teacher_tag' => 'nullable',

        ];
    }

    public function messages(): array
    {
        return [
            'activity_type.required' => 'Please select an activity type.',
            'title.required' => 'Please enter a title for your event.',
            'description.required' => 'Please write a short description of what the event is about.',
            'organizer.required' => 'Please enter an organizer.',
            'duration.required' => 'Please specify the event duration.',
            'location.required' => 'Please enter a location.',
            'start_date.required' => 'Please enter a valid date and time (example: 2014-10-22 18:00).',
            'end_date.required' => 'Please enter a valid date and time (example: 2014-10-22 18:00).',
            'audience.required' => 'If unsure, choose Other and provide more information in the description.',
            'theme.required' => 'If unsure, choose Other and provide more information in the description.',
            'participants_count.required' => 'Please specify the expected number of participants.',
            'ages.required' => 'Please select at least one age group.',
            'is_extracurricular_event.required' => 'Please specify if this is an extracurricular event.',
            'is_extracurricular_event.boolean' => 'The extracurricular event field must be true or false.',
            'country.required' => 'The event\'s location should be in Europe.',
            'event_url.url' => 'The activity\'s web page address should be a valid URL.',
            'event_url.required' => 'The activity\'s web page is required for online activities.',
            'user_email.required' => 'Please enter a valid email address.',
        ];
    }

    private function in($array): string
    {
        return 'in:'.implode(',', $array);
    }
}
