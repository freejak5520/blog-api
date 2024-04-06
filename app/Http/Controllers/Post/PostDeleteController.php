<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\JsonResponse;

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
