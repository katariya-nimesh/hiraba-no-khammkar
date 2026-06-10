<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $formType = $this->input('form_type');

        $rules = [
            // Form type (set via hidden field in the view)
            'form_type'                   => 'required|string|in:lifetime,one_time',

            // Student
            'student_name'                => 'required|string|max:255',
            'father_name'                 => 'required|string|max:255',
            'surname'                     => 'required|string|max:255',
            'mother_name'                 => 'required|string|max:255',

            // Address
            'home_type'                   => 'required|string|in:own,rent',
            'address'                     => 'required|string',
            'village'                     => 'required|string|max:255',
            'district'                    => 'required|string|max:255',
            'state'                       => 'required|string|max:255',
            'pincode'                     => 'required|digits:6',

            // Contact & Family
            'phone'                       => 'required|numeric',
            'email'                       => 'required|email',
            'total_family_members'        => 'required|numeric|min:1',
            'business'                    => 'required|string|max:255',
            'income'                      => 'required|numeric|min:0',
            'illness'                     => 'nullable',

            // School
            'school_name'                 => 'required|string|max:255',
            'standard'                    => 'required|numeric|between:5,12',
            'school_phone'                => 'required|numeric',
            'school_address'              => 'required|string',

            // School Bank Details
            'school_account_holder_name'  => 'required|string|max:100',
            'school_account_number'       => 'required|regex:/^[0-9]{6,18}$/',
            'school_ifsc'                 => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
            'school_bank_name'            => 'required|string|max:100',
        ];

        // Unique validation on Aadhar ONLY for Lifetime forms
        if ($formType === \App\Models\Application::FORM_TYPE_LIFETIME) {
            $rules['student_aadhar'] = 'required|digits:12|different:father_aadhar|different:mother_aadhar|unique:applications,student_aadhar';
            $rules['father_aadhar']  = 'required|digits:12|different:student_aadhar|different:mother_aadhar|unique:applications,father_aadhar';
            $rules['mother_aadhar']  = 'required|digits:12|different:father_aadhar|different:student_aadhar|unique:applications,mother_aadhar';
        } else {
            $rules['student_aadhar'] = 'required|digits:12|different:father_aadhar|different:mother_aadhar';
            $rules['father_aadhar']  = 'required|digits:12|different:student_aadhar|different:mother_aadhar';
            $rules['mother_aadhar']  = 'required|digits:12|different:father_aadhar|different:student_aadhar';
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        session(['showForm' => true]);
        $this->merge([
            'student_aadhar' => preg_replace('/\s+/', '', $this->student_aadhar),
            'father_aadhar'  => preg_replace('/\s+/', '', $this->father_aadhar),
            'mother_aadhar'  => preg_replace('/\s+/', '', $this->mother_aadhar),
            'phone'          => preg_replace('/\s+/', '', $this->phone),
            'school_phone'   => preg_replace('/\s+/', '', $this->school_phone),
            'school_ifsc'    => strtoupper($this->school_ifsc),
        ]);
    }

    public function messages(): array
    {
        return [
            'form_type.required'                   => 'Form type is missing. Please use the correct form link.',
            'form_type.in'                         => 'Invalid form type submitted.',
            'school_ifsc.regex'                    => 'Please enter a valid IFSC code (Example: SBIN0001234).',
            'school_account_number.regex'          => 'Account number must be between 6 and 18 digits.',
            'cancelled_cheque.mimes'               => 'Cancelled cheque must be JPG, PNG or PDF format.',
            'cancelled_cheque.max'                 => 'Cancelled cheque file size must not exceed 2MB.',
            'student_aadhar.unique'                => 'This student Aadhar number is already registered.',
            'father_aadhar.unique'                 => 'This father Aadhar number is already registered.',
            'mother_aadhar.unique'                 => 'This mother Aadhar number is already registered.',
        ];
    }
}
