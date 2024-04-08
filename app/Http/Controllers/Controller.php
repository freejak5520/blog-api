<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '0.0.1',
    description: '## Blog API with Laravel 11

Github: [https://github.com/smoothsquid/blog-api](https://github.com/smoothsquid/blog-api)',
    title: 'Blog API'
)]
#[OA\Components(
    responses: [
        new OA\Response(
            response: 'Unauthorized',
            description: 'Unauthorized',
            content: new OA\JsonContent(
                example: [
                    'message' => 'Unauthorized.'
                ]
            )
        ),
        new OA\Response(
            response: 'NotFound',
            description: 'Not found',
            content: new OA\JsonContent(
                example: [
                    "message" => "Not found"
                ]
            )
        )
    ],
    securitySchemes: [
        new OA\SecurityScheme(
            securityScheme: 'bearerToken',
            type: 'apiKey',
            name: 'Authorization',
            in: 'header',
            bearerFormat: 'JWT',
            scheme: 'bearer',
        )
    ],
)]
abstract class Controller
{
    protected int $perPage = 20;

    /**
     * default paginate size
     *
     * 페이징 처리가 필요한 API의 perPage 기본값입니다.
     *
     * @return int
     */
    public function perPage(): int
    {
        return $this->perPage;
    }
}
