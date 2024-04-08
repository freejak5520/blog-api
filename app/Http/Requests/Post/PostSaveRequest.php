<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'Post Save Request',
    description: 'Post Save Request',
    properties: [
        new OA\Property(
            property: 'title',
            description: 'Post Title',
            type: 'string',
            example: '제목 예시 입니다.'
        ),
        new OA\Property(
            property: 'content',
            description: 'Post Content',
            type: 'string',
            example: '내용 예시 입니다.'
        ),
    ]
)]
class PostSaveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:5000'],
        ];
    }
}
