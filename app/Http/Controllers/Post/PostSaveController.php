<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostSaveRequest;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;

class PostSaveController extends Controller
{
    public function __invoke(PostSaveRequest $request): JsonResponse
    {
        $params = $request->validated();

        /** @var User $user */
        $user = auth()->user();

        $post = $user->posts()->create($params);

        return response()->json($post);
    }
}
