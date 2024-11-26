<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailFormRequest extends FormRequest
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
            'first__name'=>'required|string',
            'last__name'=>'required|string',
            '__email'=>'required|email',
            '__phone'=>'required|string',
            '__message'=>'required|string',
            '__document'=>'mimes:doc,docx,pdf,xlsx,pptx,jpeg,png,jpg',
            '__terms'=>'required|string'
        ];
    }
}
