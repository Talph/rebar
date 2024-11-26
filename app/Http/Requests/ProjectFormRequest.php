<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            'project_name' => 'required|min:1|max:64',
            'project_desc' => 'required',
            'project_status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'date',
            'project_value' => 'numeric'
        ];
    }
}
