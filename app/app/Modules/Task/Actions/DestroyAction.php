<?php

declare(strict_types=1);

namespace App\Modules\Task\Actions;

use App\Models\Task;
use App\Modules\Task\ActionsDto\DestroyDto;

final class DestroyAction
{
    /**
     * @return array<string, mixed>
     */
    public function handle(DestroyDto $dto): array
    {
        Task::query()->where('uuid', $dto->uuid)->delete();

        return [
            'result' => 'success',
            'msg' => null,
            'data' => null,
        ];
    }
}
