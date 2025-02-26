<?php

namespace App\Http\Requests;

use App\Rules\validAudience;
use App\Rules\validTheme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

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
            'location' => 'required_unless:activity_type,open-online,invite-online',
            'event_url' => 'required_if:activity_type,open-online,invite-online',
            'language' => ['required', $this->in($languages)],
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'audience' => ['required', new ValidAudience],
            'theme' => ['required', new ValidTheme],
            'country_iso' => 'required|exists:countries,iso',
            'user_email' => 'required',
            'organizer_type' => 'required',
            'privacy' => 'required',
            'leading_teacher_tag' => 'nullable',
            'participants_count' => 'required|integer|min:1',
            'percentage_of_females' => 'nullable|integer|min:0',
            'percentage_of_males' => 'nullable|integer|min:0',
            'percentage_of_other' => 'nullable|integer|min:0',
            'age_group' => 'nullable|string|in:0-5,6-18,19-25,Over 25',
            'extracurricular_activity' => 'required|string|in:yes,no',
            'recurring_event' => 'required|string|in:yes,no',
            'frequency' => 'nullable|string|in:daily,weekly,monthly',
        ];
    }

    public function messages(): array
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
            'event_url.url' => 'The activity\'s web page address should be a valid URL.',
            'event_url.required' => 'The activity\'s web page is required for online activities.',
            'user_email.required' => 'Please enter a valid email address.',
            'participants_count.required' => 'Please enter the total number of participants.',
            'participants_count.integer' => 'The number of participants must be a valid integer.',
            'percentage_of_females.integer' => 'The number of female participants must be a valid integer.',
            'percentage_of_males.integer' => 'The number of male participants must be a valid integer.',
            'percentage_of_other.integer' => 'The number of participants with other genders must be a valid integer.',
            'age_group.in' => 'Please select a valid age group.',
            'extracurricular_activity.required' => 'Please specify if this is an extracurricular activity.',
            'extracurricular_activity.in' => 'Please select a valid option for extracurricular activity.',
            'recurring_event.required' => 'Please specify if the event is recurring.',
            'recurring_event.in' => 'Please select a valid option for recurring event.',
            'frequency.in' => 'Please select a valid frequency.',
        ];
    }


    private function in($array): string
    {
        return 'in:'.implode(',', $array);
    }
}
