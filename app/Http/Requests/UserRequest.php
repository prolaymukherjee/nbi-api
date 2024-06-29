<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use App\Services\Common\ApiResponseService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Constants\Messages as MessagesConstant;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Enums\UserRole;


class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
            'confirm_password' => 'required|same:password',
            'role' => ['required', 'string', Rule::in(array_column(UserRole::cases(), 'value'))],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ApiResponseService::error(
            MessagesConstant::VALIDATION_ERROR,
            Response::HTTP_UNPROCESSABLE_ENTITY,
            $validator->errors()
        );

        throw new HttpResponseException($response);
    }
}
