<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveLanguageRequest extends FormRequest
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
        $uniq = Rule::unique('languages', 'id')->ignore($this->route('language'));
        return [

                'id' => ['required', 'string', 'max:10', $uniq],
                'name' => ['required', 'string', 'max:50'],
                'active' => ['nullable', 'boolean'],
                'default' => ['nullable', 'boolean'],
                'fallback' => ['nullable', 'boolean'],

        ];
    }
}
