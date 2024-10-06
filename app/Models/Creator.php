<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $table = 'creators';

    public const STATUS_BANNED = 'banned';
    public const STATUS_ACTIVE = 'active';
    protected $fillable = [
        'user_id',
        'social_media_link',
        'address',
        'follower_count',
        'platform',
        'status',
        'ban_reason',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
