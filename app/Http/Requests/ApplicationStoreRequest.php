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
            "student_name" => "nullable",
            "father_name" => "nullable",
            "surname" => "nullable",
            "mother_name" => "nullable",
            "student_aadhar" => "required|unique:applications,student_aadhar",
            "father_aadhar" => "required|unique:applications,father_aadhar",
            "mother_aadhar" => "required|unique:applications,mother_aadhar",
            "home_type" => "nullable",
            "address" => "nullable",
            "village" => "nullable",
            "district" => "nullable",
            "state" => "nullable",
            "phone" => "nullable",
            "email" => "nullable|email",
            "total_family_members" => "nullable|numeric",
            "business" => "nullable",
            "income" => "nullable|numeric",
            "illness" => "nullable",
            "school_name" => "nullable",
            "standard" => "nullable|numeric",
            "school_phone" => "nullable",
            "school_address" => "nullable",
        ];
    }
}
