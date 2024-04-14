<?php

declare(strict_types=1);

namespace App\Models\Trait;

use DB;

trait LimitTextField
{
    public function scopeLimitText($query, $field, $limit)
    {
        return $query->select(DB::raw("LEFT({$field}, $limit) as {$field}"));
    }
}