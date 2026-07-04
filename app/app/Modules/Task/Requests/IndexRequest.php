<?php

declare(strict_types=1);

namespace App\Modules\Task\Requests;

use App\Modules\Task\ActionsDto\IndexDto;
use Illuminate\Foundation\Http\FormRequest;

final class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filter' => 'array',
            'page' => 'integer',
        ];
    }

    /**
     * @return IndexDto
     */
    public function getDto(): IndexDto
    {
        $params = $this->validated();
        $params['page'] = array_key_exists('page', $params) ? (int) $params['page'] : 1;
        $params['filter'] = $params['filter'] ?? [];

        return new IndexDto(...$params);
    }
}
