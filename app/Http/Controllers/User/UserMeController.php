<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 로그인한 유저 정보
 */
class UserMeController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        return response()->json(auth()->user());
    }
}
