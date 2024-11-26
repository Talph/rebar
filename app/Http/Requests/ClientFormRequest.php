<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ClientFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'client_name'   => 'required|min:1|max:64',
            'client_desc'    => 'required|string',
            'client_logo' => 'mimes:jpg,png,jpeg',
            'value_added' => 'string',
            'example_one' => 'mimes:jpg,png,jpeg',
            'example_two' => 'mimes:jpg,png,jpeg',
            'example_three' => 'mimes:jpg,png,jpeg',
        ];
    }
}
