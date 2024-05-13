<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
        return [
            'title'=>['required','max:100'],
            'desc'=>['nullable','max:255'],
            'done'=>['nullable'],
            'user_id'=>['required',Rule::exists('users','id')],
            'deadline'=>['required','date_format:"Y-m-d H:i:s"',],
        ];
    }
}
