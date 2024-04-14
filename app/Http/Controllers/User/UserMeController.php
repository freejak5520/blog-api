<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDetailResource;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Get(
    path: '/api/users/me',
    description: '# Me',
    summary: 'Me',
    tags: ['User'],
    responses: [
        new OA\Response(
            response: Response::HTTP_OK,
            description: 'OK',
            content: new OA\JsonContent(
                ref: '#/components/schemas/UserDetailResource'
            )
        ),
        new OA\Response(
            ref: '#/components/responses/Unauthorized',
            response: Response::HTTP_UNAUTHORIZED
        ),
    ])]
class UserMeController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return UserDetailResource::make(authUser())->response();
//        response()->json(authUser());
    }
}
