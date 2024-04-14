<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostSaveRequest;
use App\Http\Resources\Post\PostDetailResource;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Post(
    path: '/api/posts',
    description: 'Save Post',
    summary: 'Save Post',
    requestBody: new OA\RequestBody(
        description: 'Post Save Request Body',
        required: true,
        content: new OA\JsonContent(
            ref: '#/components/schemas/PostSaveRequest'
        )
    ),
    tags: ['Post'],
    responses: [
        new OA\Response(
            response: Response::HTTP_OK,
            description: 'Post Detail',
            content: new OA\JsonContent(
                ref: '#/components/schemas/PostDetailResource'
            )
        ),
        new OA\Response(
            ref: '#/components/responses/Unauthorized',
            response: Response::HTTP_UNAUTHORIZED
        ),
    ],
)]
class PostSaveController extends Controller
{
    public function __invoke(PostSaveRequest $request): JsonResponse
    {
        $params = $request->validated();

        $user = authUser();

        $post = $user->posts()->create($params);

        return PostDetailResource::make($post)->response();
    }
}
