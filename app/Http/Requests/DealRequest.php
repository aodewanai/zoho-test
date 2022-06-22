<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
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
            'Deal_Name' => 'required|string|max:255',
            'Stage' => 'required|string|max:255',
            'Pipeline' => 'required|string|max:255',
            'Contact_id'    => 'string|max:20'
        ];
    }
}
