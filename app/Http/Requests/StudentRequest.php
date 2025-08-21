<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
                    'name' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'birth_date' => 'required|string|max:255',
                    'gender' => 'required|string|max:255',
                    'phone_number' => 'required|string|max:255',
                    'admission_number' => 'required|string|max:255',
                    'roll_number' => 'required|string|max:255',
                    'class_id' => 'required|exists:classes,id'
                ];

        return $rules;
    }
}
