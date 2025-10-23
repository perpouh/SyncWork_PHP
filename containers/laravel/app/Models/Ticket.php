<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\TicketStatus;
use App\Enums\TicketPriority;
use App\Enums\TicketType;

/**
 * @property int $project_id
 * @property string $title
 * @property string $description
 * @property TicketStatus $status
 * @property TicketPriority $priority
 * @property TicketType $type
 * @property int $assignee_id
 * @property int $reporter_id
 */
class Ticket extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'priority',
        'type',
        'assignee_id',
        'reporter_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function isOpen(): bool
    {
        return $this->status === TicketStatus::OPEN;
    }

    public function isInProgress(): bool
    {
        return $this->status === TicketStatus::IN_PROGRESS;
    }
    
    public function isPending(): bool
    {
        return $this->status === TicketStatus::PENDING;
    }

    public function isClosed(): bool
    {
        return $this->status === TicketStatus::CLOSED;
    }

    public function isLowPriority(): bool
    {
        return $this->priority === TicketPriority::LOW;
    }

    public function isMediumPriority(): bool
    {
        return $this->priority === TicketPriority::MEDIUM;
    }
    
    public function isHighPriority(): bool
    {
        return $this->priority === TicketPriority::HIGH;
    }

    public function isCriticalPriority(): bool
    {
        return $this->priority === TicketPriority::CRITICAL;
    }

    public function isBugfix(): bool
    {
        return $this->type === TicketType::BUGFIX;
    }

    public function isFeature(): bool
    {
        return $this->type === TicketType::FEATURE;
    }

    public function isTask(): bool
    {
        return $this->type === TicketType::TASK;
    }

    public function isUncategorized(): bool
    {
        return $this->type === TicketType::UNCATEGORIZED;
    }
}
