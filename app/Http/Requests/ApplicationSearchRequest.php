<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationSearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search'     => ['nullable', 'string', 'max:255'],
            'status'     => ['nullable', 'string'],
            'from_date'  => ['nullable', 'date'],
            'to_date'    => ['nullable', 'date', 'after_or_equal:from_date'],
        ];
    }

    public function validatedData(): array
    {
        return [
            'search'    => trim($this->input('search')),
            'status'    => $this->input('status'),
            'from_date' => $this->input('from_date'),
            'to_date'   => $this->input('to_date'),
        ];
    }
}
