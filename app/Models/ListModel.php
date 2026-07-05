<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ListModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lists';

    protected $fillable = [
        'uuid',
        'name',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($list) {
            if (empty($list->uuid)) {
                $list->uuid = Str::uuid();
            }

            if (!isset($list->order)) {
                $list->order = static::max('order') + 1;
            }
        });
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'list_id');
    }
}
