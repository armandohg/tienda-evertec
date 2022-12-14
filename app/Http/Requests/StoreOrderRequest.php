<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name' => ['required', 'string', 'max:80'],
            'customer_email' => ['required', 'string', 'max:120'],
            'customer_mobile' => ['required', 'max:40'],
            'comments' => ['nullable', 'string'],
        ];
    }
}
