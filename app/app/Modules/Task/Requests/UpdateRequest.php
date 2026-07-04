<?php

declare(strict_types=1);

namespace App\Modules\Task\Requests;

use App\Modules\Task\ActionsDto\UpdateDto;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    /**
     * {@inheritdoc}
     * @return array<string, mixed>
     */
    public function all($keys = null): array
    {
        $data = parent::all($keys);
        $data['uuid'] = $this->route('task');

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'uuid' => 'required|uuid|exists:tasks,uuid',
            'name' => 'required|string|max:63',
            'description' => 'string',
            'complexity' => 'required|integer',
            'execution_time' => [
                'date',
                'regex:/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(Z|[+-]\d{2}:\d{2})$/'
            ],
        ];
    }

    /**
     * @return UpdateDto
     */
    public function getDto(): UpdateDto
    {
        $data = $this->validated();
        $data['complexity'] = (int) $data['complexity'];
        $data['execution_time'] = $this->date('execution_time')->utc();
        return new UpdateDto(...$data);
    }
}
