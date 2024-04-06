<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    properties: [
        new OA\Property(
            property: 'access_token',
            description: 'Access Token',
            type: 'string',
            example: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJoZWxsbyIsImlhdCI6ImhpIiwiZXhwIjoid293IiwibmJmIjoiYW1hemluZyIsImp0aSI6Im9vb29vb28iLCJzdWIiOiIxMjMxMjMxMjMiLCJwcnYiOiJkc2p1ZGtqc2Fka2xqYXNrZGxqc2Fka3NhamFrZCJ9.ILIjmHphAd1DtDnZlYsUTUaiofmy7GTImPATdhbTd_8'
        ),
        new OA\Property(
            property: 'token_type',
            description: 'Token Type',
            type: 'string',
            example: 'bearer'
        ),
        new OA\Property(
            property: 'expires_in',
            description: 'Expiration seconds',
            type: 'integer',
            example: '3600'
        ),
    ],
  
)]
class TokenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this->resource,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}
