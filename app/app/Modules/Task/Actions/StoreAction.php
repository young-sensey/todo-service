<?php

declare(strict_types=1);

namespace App\Modules\Task\Actions;

use App\Models\Task;
use App\Modules\Task\ActionsDto\StoreDto;
use Illuminate\Support\Str;

final class StoreAction
{
    /**
     * @return array<string, mixed>
     */
    public function handle(StoreDto $dto): array
    {
        $uuid = Str::uuid()->toString();
        Task::create([
            'uuid' => $uuid,
            'name' => $dto->name,
            'description' => $dto->description,
            'complexity' => $dto->complexity,
            'execution_time' => $dto->execution_time,
        ]);

        return [
            'result' => 'success',
            'msg' => null,
            'data' => $uuid,
        ];
    }
}
