<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campaigns';

    public const STATUS_ACTIVE = 'active';
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';

    public const TRANSLATED_STATUS = [
        self::STATUS_ACTIVE => 'Đang hoạt động',
        self::STATUS_PENDING => 'Chuẩn bị',
        self::STATUS_COMPLETED => 'Hoàn thành',
    ];
    protected $fillable = [
        'name',
        'code',
        'description',
        'start_date',
        'end_date',
        'status',
        'follower_required',
        'blacklist_excluded',
        'created_by_id',
        'updated_by_id',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function approvalHistories(): HasMany
    {
        return $this->hasMany(ApprovalHistory::class);
    }

    public function campaignRegistrations(): HasMany
    {
        return $this->hasMany(CampaignRegistration::class);
    }

    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
