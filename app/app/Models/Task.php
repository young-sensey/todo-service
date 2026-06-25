<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'status',
        'repeat',
        'priority',
        'complexity',
        'execution_time',
        'list_id',
    ];

    protected $appends = ['formatted_execution_time'];

    protected $casts = [
        'execution_time' => 'datetime',
        'priority' => 'integer',
        'complexity' => 'integer',
    ];

    public function getFormattedExecutionTimeAttribute(): ?string
    {
        return $this->execution_time
            ? $this->execution_time->format('d.m.Y')
            : null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            if (empty($task->uuid)) {
                $task->uuid = Str::uuid();
            }
        });
    }

    public function list(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ListModel::class, 'list_id');
    }
}
