<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;
use Str;

#[OA\Schema(
    ref: '#/components/schemas/PostDetailResource'
)]
class PostSimpleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => Str::limit($this->content, 150),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
