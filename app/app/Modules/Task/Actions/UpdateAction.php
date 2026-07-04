<?php

declare(strict_types=1);

namespace App\Modules\Task\Actions;

use App\Models\Task;
use App\Modules\Task\ActionsDto\UpdateDto;

final class UpdateAction
{
    /**
     * @return array<string, mixed>
     */
    public function handle(UpdateDto $dto): array
    {
        Task::query()
            ->where('uuid', $dto->uuid)
            ->update([
                'name' => $dto->name,
                'description' => $dto->description,
                'complexity' => $dto->complexity,
                'execution_time' => $dto->execution_time,
            ]);

        return [
            'result' => 'success',
            'msg' => null,
            'data' => $dto->uuid,
        ];
    }
}
