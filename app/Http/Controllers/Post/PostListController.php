<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostSimpleResource;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[OA\Get(
    path: '/api/v1/posts',
    description: 'Post List',
    summary: 'Post List',
    tags: ['Post'],
    responses: [
        new OA\Response(
            response: Response::HTTP_OK,
            description: 'OK',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'data',
                        description: '게시글 목록',
                        type: 'array',
                        items: new OA\Items(ref: '#/components/schemas/PostDetailResource')
                    ),
                ]
            )
        ),
    ]
)]
class PostListController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $builder = Post::query()
            ->orderByDesc('id');

        return PostSimpleResource::collection($builder->paginate($this->perPage()))->response();
    }
}
