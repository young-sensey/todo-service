<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'description', 'status', 'repeat', 'priority', 'complexity', 'execution_time', 'list_id'
    ];

    protected $casts = [
        'execution_time' => 'datetime',
        'priority' => 'integer',
        'complexity' => 'integer',
    ];

    public function list(): BelongsTo
    {
        return $this->belongsTo(ListModel::class, 'list_id');
    }
}
