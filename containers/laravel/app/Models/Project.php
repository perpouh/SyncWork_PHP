<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon $archived_at
 */
class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'archived_at'
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    /**
     * Archive the project
     *
     * @return void
     */
    public function archive(){
        $this->archived_at = now();
        $this->save();
    }

    public function unarchive(){
        $this->archived_at = null;
        $this->save();
    }

    public function isArchived(){
        return $this->archived_at !== null;
    }
}
