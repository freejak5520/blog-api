<?php

declare(strict_types=1);

namespace App\Models\Post;

use App\Models\Trait\LimitTextField;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use LimitTextField;

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * Writer
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
