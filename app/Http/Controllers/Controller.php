<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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
