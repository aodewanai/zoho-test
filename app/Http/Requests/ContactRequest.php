<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'Last_Name' => 'required|string|max:255',
            'First_Name' => 'string|max:255',
            'Full_Name' => 'string|max:255',
            'Email'    => 'email:filter',
            'Department' => 'string|max:255',
            'Phone'    => 'digits:10',
            'Mobile'    => 'digits:10',
            'Title' => 'string|max:255'
        ];
    }
}
