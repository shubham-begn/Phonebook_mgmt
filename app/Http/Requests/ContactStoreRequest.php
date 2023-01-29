<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'address' =>'required|string',
            'email' => 'required|email',
            'links' =>'required',
            'company' =>'required',
            'dob'=>'required | date | before:today'

         ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'address.required' => 'Address is required!',
            'email.required' => 'Email is required!',
            'link.required' => 'link is required!',
            'company.required' => 'Company is required!',
            'dob.required' => 'dob is required!',

        ];
    }
}
