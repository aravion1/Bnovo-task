<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestUpdateRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|min:1|max:255',
            'email' => 'email|unique:guests,email|max:255|min:1',
            'sername' => 'string|min:1|max:255',
            'phone' => 'string|min:1|max:30',
            'country' => 'string|min:1|max:50',
        ];
    }
}
