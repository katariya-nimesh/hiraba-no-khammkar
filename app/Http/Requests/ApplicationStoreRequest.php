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
        return [
            "student_name" => "required|string|max:255",
            "father_name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "mother_name" => "required|string|max:255",
            "student_aadhar" => "required|digits:12|different:father_aadhar|different:mother_aadhar|unique:applications,student_aadhar",
            "father_aadhar" => "required|digits:12|different:student_aadhar|different:mother_aadhar|unique:applications,father_aadhar",
            "mother_aadhar" => "required|digits:12|different:father_aadhar|different:student_aadhar|unique:applications,mother_aadhar",
            "home_type" => "required|string|in:own,rent",
            "address" => "required|string",
            "village" => "required|string|max:255",
            "district" => "required|string|max:255",
            "state" => "required|string|max:255",
            "phone" => "required|numeric",
            "email" => "required|email",
            "total_family_members" => "required|numeric|min:1",
            "business" => "required|string|max:255",
            "income" => "required|numeric|min:0",
            "illness" => "nullable",
            "school_name" => "required|string|max:255",
            "standard" => "required|numeric|between:5,12",
            "school_phone" => "required|numeric",
            "school_address" => "required|string",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'student_aadhar' => preg_replace('/\s+/', '', $this->student_aadhar),
            'father_aadhar'  => preg_replace('/\s+/', '', $this->father_aadhar),
            'mother_aadhar'  => preg_replace('/\s+/', '', $this->mother_aadhar),
            'phone'          => preg_replace('/\s+/', '', $this->phone),
            'school_phone'   => preg_replace('/\s+/', '', $this->school_phone),
        ]);
    }
}
