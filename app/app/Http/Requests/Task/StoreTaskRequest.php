<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:63',
            'description' => 'nullable|string',
            'status' => 'in:done,pending,expired,cancelled',
            'repeat' => 'nullable|string|max:31',
            'priority' => 'integer',
            'complexity' => 'integer',
            'execution_time' => 'nullable|date',
        ];
    }
}