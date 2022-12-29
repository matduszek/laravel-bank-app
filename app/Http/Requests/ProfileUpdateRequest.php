<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'phone_number' => ['regex:/^[0-9\+]{8,13}$/', Rule::unique(User::class)->ignore($this->user()->phone_number)],
            'domicile' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'postal_code' => ['regex:/^\d{2}-\d{3}$/'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
