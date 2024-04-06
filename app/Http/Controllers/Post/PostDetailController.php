<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;

class PostDetailController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);

        return response()->json($post);
    }
}
