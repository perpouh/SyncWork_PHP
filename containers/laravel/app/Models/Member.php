<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $table = 'project_user';

    protected $fillable = [
        'project_id',
        'user_id',
        'role',
        'status',
        'assigned_at',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * アクセサ: メンバー名を取得
     */
    public function getNameAttribute(): string
    {
        return $this->user ? $this->user->name : '';
    }

    /**
     * アクセサ: フロントエンド用の配列形式
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'status' => $this->status,
            'assigned_at' => $this->assigned_at,
            'user' => $this->user ? $this->user->toArray() : null,
        ];
    }
}
