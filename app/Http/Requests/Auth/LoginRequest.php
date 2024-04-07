<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'Login Request',
    description: 'Login credentials',
    properties: [
        new OA\Property(
            property: 'email',
            description: 'Email',
            type: 'string',
            example: 'freejak5520@gmail.com'
        ),
        new OA\Property(
            property: 'password',
            description: 'Password',
            type: 'string',
            example: 'password'
        ),
    ]
)]
class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }
}
