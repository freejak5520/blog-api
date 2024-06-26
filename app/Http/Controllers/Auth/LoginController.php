<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\TokenResource;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Post(
    path: '/api/v1/auth/login',
    description: '# Login',
    summary: 'Login',
    requestBody: new OA\RequestBody(
        description: 'Login Credentials',
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/LoginRequest')
    ),
    tags: ['Auth'],
    responses: [
        new OA\Response(
            response: Response::HTTP_OK,
            description: 'OK',
            content: new OA\JsonContent(
                ref: '#/components/schemas/TokenResource'
            )
        ),
        new OA\Response(
            ref: '#/components/responses/Unauthorized',
            response: Response::HTTP_UNAUTHORIZED
        ),
    ]
)]
class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!$token = auth('api')->attempt($credentials)) {
            abort(401);
        }

        return TokenResource::make($token)->response();
    }
}
