<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'parent_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email:rfc', 'max:150'],
            'phone' => ['required', 'string', 'max:35'],
            'child_age_or_dob' => ['required', 'string', 'max:60'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today'],
            'preferred_time' => ['required', 'string', 'max:50'],
            'intended_start_date' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'gdpr_consent' => ['accepted'],
            'website_url' => ['nullable', 'string'], // Honeypot field - intercepted silently in controller
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'parent_name.required' => 'Please provide your full name.',
            'email.required' => 'A valid email address is required so we can confirm your visit.',
            'email.email' => 'Please enter a valid RFC-compliant email address.',
            'phone.required' => 'Please provide a telephone number for visit coordination.',
            'child_age_or_dob.required' => 'Please indicate your child\'s age or date of birth.',
            'preferred_date.required' => 'Please select a preferred visit date.',
            'preferred_date.after_or_equal' => 'The preferred visit date must be today or a future date.',
            'preferred_time.required' => 'Please select a preferred time slot.',
            'gdpr_consent.accepted' => 'You must consent to the storage of your details to submit an enquiry under EU GDPR.',
            'website_url.max' => 'Spam detected.',
        ];
    }
}
