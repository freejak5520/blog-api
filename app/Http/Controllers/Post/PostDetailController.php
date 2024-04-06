<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/api/posts/{id}',
    description: 'Post Detail',
    summary: 'Post Detail',
    tags: ['Post'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Post Detail',
            content: new OA\JsonContent(
                ref: '#/components/schemas/PostDetailResource'
            )
        )
    ]
)]
class PostDetailController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);

        return response()->json($post);
    }
}
