<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;

/**
 * 게시글 목록
 */
class PostListController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $builder = Post::query()
            ->orderByDesc('id');

        return response()->json($builder->paginate($this->perPage()));
    }
}
