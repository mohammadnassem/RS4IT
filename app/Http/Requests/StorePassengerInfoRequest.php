<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePassengerInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'place_of_birth' => ['required', 'date', 'before:tomorrow'],
            'country_of_residence' => ['required'],
            'passport_no' => ['required', 'string', 'min:6'],
            'issue_date' => ['required', 'date', 'before:tomorrow'],
            'expiry_date' => ['required', 'date', 'after:yesterday'],
            'arrival_date' => ['required', 'date', 'after:yesterday'],
            'profession' => ['nullable', 'string'],
            'organization' => ['nullable', 'string'],
            'visa_duration' => ['required', 'numeric'],
            'visa_status' => ['required'],
            'personal_pic' => ['required'],
            'passport_pic' => ['required'],
            'have_companion' => ['required'],
            'companion.first_name' => ['required_if:have_companion,1', 'string'],
            'companion.last_name' => ['required_if:have_companion,1', 'string'],
            'companion.dob' => ['required_if:have_companion,1', 'date'],
            'companion.place_of_birth' => ['required_if:have_companion,1', 'date', 'before:tomorrow'],
            'companion.country_of_residence' => ['required_if:have_companion,1',],
            'companion.passport' => ['required_if:have_companion,1', 'string', 'min:6'],
            'companion.issue_date' => ['required_if:have_companion,1', 'date', 'before:tomorrow'],
            'companion.expiry_date' => ['required_if:have_companion,1', 'date', 'after:yesterday'],
            'companion.arrival_date' => ['required_if:have_companion,1', 'date', 'after:yesterday'],
            'companion.profession_no' => ['nullable', 'string'],
            'companion.organization' => ['nullable', 'string'],
            'companion.visa_duration' => ['required_if:have_companion,1', 'numeric'],
            'companion.visa_status' => ['required_if:have_companion,1'],
            'companion.personal_pic' => ['required_if:have_companion,1'],
            'companion.passport_pic' => ['required_if:have_companion,1']
        ];
    }
}
