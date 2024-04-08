<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'User Detail Resource',
    description: 'User Detail Resource',
    properties: [
        new OA\Property(
            property: "data",
            properties: [
                new OA\Property(
                    property: "id",
                    description: "ID",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "name",
                    description: "이름",
                    type: "string",
                    example: "freejak5520"
                ),
                new OA\Property(
                    property: "email",
                    description: "이메일",
                    type: "string",
                    example: "freejak5520@gmail.com"
                ),
                new OA\Property(
                    property: "created_at",
                    description: "가입일",
                    type: "string",
                    example: "2024-04-06T02:28:01.000000Z"
                ),
                new OA\Property(
                    property: "updated_at",
                    description: "수정일",
                    type: "string",
                    example: "2024-04-06T02:28:01.000000Z",
                    nullable: true
                ),
            ],
            type: "object"
        )
    ],
    type: 'object'
)]
class UserDetailResource extends JsonResource
{
}
