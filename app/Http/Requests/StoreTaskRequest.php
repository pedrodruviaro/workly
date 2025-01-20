<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:240'],
            'description' => ['required', 'string', 'min:3'],
            'priority' => ['required', 'string'],
            'due_date' => ['required', 'date', 'after:today'],
        ];
    }
}
