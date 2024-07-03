<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];
    }
}
