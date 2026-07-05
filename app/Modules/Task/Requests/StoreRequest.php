<?php

declare(strict_types=1);

namespace App\Modules\Task\Requests;

use App\Modules\Task\ActionsDto\StoreDto;
use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
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
     * @return StoreDto
     */
    public function getDto(): StoreDto
    {
        $data = $this->validated();
        $data['complexity'] = (int) $data['complexity'];
        $data['execution_time'] = $this->date('execution_time')->utc();
        return new StoreDto(...$data);
    }
}
