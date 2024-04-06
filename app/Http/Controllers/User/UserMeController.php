<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserMeController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return response()->json(authUser());
    }
}
