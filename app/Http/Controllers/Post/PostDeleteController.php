<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Delete(
    path: '/api/posts/{id}',
    description: 'Delete Post',
    summary: 'Delete Post',
    tags: ['Post'],
    responses: [
        new OA\Response(
            response: Response::HTTP_OK,
            description: 'Success',
        ),
        new OA\Response(
            response: Response::HTTP_UNAUTHORIZED,
            description: 'Unauthorized',
            content: new OA\JsonContent(
                example: [
                    'message' => 'Unauthorized.'
                ]
            )
        )
    ]
)]
class PostDeleteController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $user = authUser();

        $post = Post::findOrFail($id);

        if ($post->user_id !== $user->getKey()) {
            abort(403);
        }

        $post->delete();

        return response()->json(['message' => 'Success']);
    }
}
