<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $contact = $this->route('contact');
        $contactId = $contact instanceof \App\Models\Contact ? $contact->id : $contact;

        return [
            'name' => 'required|string|min:5|max:255',
            'contact' => 'required|string|digits:9|unique:contacts,contact,'.$contactId,
            'email' => 'required|string|email|max:255|unique:contacts,email,'.$contactId,
        ];
    }
}
