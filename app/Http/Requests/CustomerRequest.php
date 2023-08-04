<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:60',
            'no_sim' => ['required', 'numeric', 'digits:12', Rule::unique('customers', 'no_sim')->ignore($this->customer)],
            'phone' => ['required', 'numeric', 'digits_between:10,12', Rule::unique('customers', 'phone')->ignore($this->customer)],
            'email' => ['nullable', 'email', Rule::unique('customers', 'email')->ignore($this->customer)],
            'address' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|file|image|max:2500',
        ];
    }
}
