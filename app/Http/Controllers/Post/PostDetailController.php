<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostDetailResource;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Get(
    path: '/api/posts/{id}',
    description: 'Post Detail',
    summary: 'Post Detail',
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
            ref: '#/components/responses/NotFound',
            response: Response::HTTP_NOT_FOUND
        ),
    ]
)]
class PostDetailController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);

        return PostDetailResource::make($post)->response();
    }
}
