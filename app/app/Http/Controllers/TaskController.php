<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Task\Actions\DestroyAction;
use App\Modules\Task\Actions\IndexAction;
use App\Modules\Task\Actions\ShowAction;
use App\Modules\Task\Actions\StoreAction;
use App\Modules\Task\Actions\UpdateAction;
use App\Modules\Task\Requests\DestroyRequest;
use App\Modules\Task\Requests\IndexRequest;
use App\Modules\Task\Requests\ShowRequest;
use App\Modules\Task\Requests\StoreRequest;
use App\Modules\Task\Requests\UpdateRequest;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Получить список задач.
     */
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        $result = $action->handle($request->getDto());
        return response()->json($result);
    }

    /**
     * Создать задачу.
     */
    public function store(StoreRequest $request, StoreAction $action): JsonResponse
    {
        $result = $action->handle($request->getDto());
        return response()->json($result);
    }

    /**
     * Получить информацию о задаче.
     */
    public function show(ShowRequest $request, ShowAction $action): JsonResponse
    {
        $result = $action->handle($request->getDto());
        return response()->json($result);
    }

    /**
     * Обновить задачу.
     */
    public function update(UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        $result = $action->handle($request->getDto());
        return response()->json($result);
    }

    /**
     * Удалить задачу.
     */
    public function destroy(DestroyRequest $request, DestroyAction $action): JsonResponse
    {
        $result = $action->handle($request->getDto());
        return response()->json($result);
    }
}
