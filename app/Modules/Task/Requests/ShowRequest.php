<?php

declare(strict_types=1);

namespace App\Modules\Task\Requests;

use App\Modules\Task\ActionsDto\ShowDto;
use Illuminate\Foundation\Http\FormRequest;

final class ShowRequest extends FormRequest
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
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'uuid' => 'required|uuid|exists:tasks,uuid',
        ];
    }

    /**
     * @return ShowDto
     */
    public function getDto(): ShowDto
    {
        return new ShowDto($this->route('task'));
    }
}
