<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'name' => 'required',
            'author' => 'required | string',
            'price' => 'required | numeric',
            'amount' => 'required | numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please provide a valid book name.',
            'author.required' => 'Please provide a valid author name.',
            'author.string' => 'Name must be a string.',
            'price.required' => 'Please fill this form.',
            'price.numeric' => 'Price must be a number.',
            'amount.required' => 'Please fill this form.',
            'amount.numeric' => 'Price must be a number.',
        ]; // TODO: Change the autogenerated stub
    }
}
