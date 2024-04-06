<?php

declare(strict_types=1);

namespace App\Models\User;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OpenApi\Attributes as OA;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

#[OA\Schema(
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
    type: 'object'
)]
class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
