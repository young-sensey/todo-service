<?php

declare(strict_types=1);

namespace App\Modules\Task\Actions;

use App\Models\Task;
use App\Modules\Task\ActionsDto\ShowDto;

final class ShowAction
{
    /**
     * @return array<string, mixed>
     */
    public function handle(ShowDto $dto): array
    {
        $task = Task::query()->where('uuid', $dto->uuid)->firstOrFail()->toArray();

        return [
            'result' => 'success',
            'msg' => null,
            'data' => $this->prepareData($task),
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function prepareData(array $data): array
    {
        return [
            'id' => $data['id'],
            'uuid' => $data['uuid'],
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'repeat' => $data['repeat'],
            'priority' => $data['priority'],
            'complexity' => $data['complexity'],
            'execution_time' => $data['execution_time'],
        ];
    }
}
