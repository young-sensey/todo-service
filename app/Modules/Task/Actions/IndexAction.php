<?php

declare(strict_types=1);

namespace App\Modules\Task\Actions;

use App\Models\Task;
use App\Modules\Task\ActionsDto\IndexDto;
use Illuminate\Database\Eloquent\Builder;

final class IndexAction
{
    private const int LIMIT = 50;

    /**
     * @return array<string, mixed>
     */
    public function handle(IndexDto $dto): array
    {
        $query = Task::query();
        $query = $this->addFilters($query, $dto->filter);

        $tasks = $query->orderByDesc('id')
            ->paginate(perPage: self::LIMIT, page: $dto->page)
            ->toArray();

        return [
            'result' => 'success',
            'msg' => null,
            'data' => $this->prepareData($tasks),
        ];
    }

    private function addFilters(Builder $query, array $filter): Builder
    {
        if (empty($filter)) {
            return $query;
        }

        foreach ($filter as $key => $value) {
            switch ($key) {
                case 'name':
                    $query->where($key, 'like', "%$value%");
                    break;
                default:
                    $query->where($filter, $value);
            }
        }

        return $query;
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function prepareData(array $data): array
    {
        $items = $data['data'];
        $tasks = [];
        foreach ($items as $item) {
            $tasks[] = [
                'id' => $item['id'],
                'uuid' => $item['uuid'],
                'name' => $item['name'],
                'description' => $item['description'],
                'status' => $item['status'],
                'repeat' => $item['repeat'],
                'priority' => $item['priority'],
                'complexity' => $item['complexity'],
                'execution_time' => $item['execution_time'],
            ];
        }

        return [
            'tasks' => $tasks,
            'pagination' => [
                'current_page' => $data['current_page'],
                'last_page' => $data['last_page'],
                'per_page' => $data['per_page'],
                'total' => $data['total'],
                'links' => $data['links'],
            ],
        ];
    }
}
