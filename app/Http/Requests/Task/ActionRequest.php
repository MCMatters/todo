<?php

declare(strict_types = 1);

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActionRequest
 *
 * @package App\Http\Requests\Task
 */
class ActionRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'body' => ['nullable', 'string', 'max:1000'],
            'action' => ['required', 'in:update,done,undone,destroy'],
        ];
    }
}
