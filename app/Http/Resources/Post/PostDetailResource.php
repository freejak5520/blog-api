<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'Post Detail Resource',
    description: 'Post Detail Resource',
    properties: [
        new OA\Property(
            property: 'data',
            properties: [
                new OA\Property(
                    property: 'id',
                    description: 'Post ID',
                    type: 'integer',
                    example: 1
                ),
                new OA\Property(
                    property: 'slug',
                    description: '게시글 URL에 사용하는 slug입니다.',
                    type: 'string',
                    example: 'this_is_slug'
                ),
                new OA\Property(
                    property: 'title',
                    description: 'Post Title',
                    type: 'string',
                    example: 'This is title'
                ),
                new OA\Property(
                    property: 'content',
                    description: 'Post Content',
                    type: 'string',
                    example: 'This is Contents'
                ),
                new OA\Property(
                    property: 'created_at',
                    description: 'Post Created At',
                    type: 'string',
                    example: '2024-04-06T06:42:14.000000Z'
                ),
                new OA\Property(
                    property: 'updated_at',
                    description: 'Post Updated At',
                    type: 'string',
                    example: '2024-04-06T06:42:14.000000Z'
                ),
            ],
            type: 'object'
        ),
    ]
)]
class PostDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
