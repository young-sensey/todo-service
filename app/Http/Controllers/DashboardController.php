<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $listId = $request->query('list_id');

        $tasksQuery = Task::query()->orderBy('created_at', 'desc');

        if ($listId) {
            $tasksQuery->where('list_id', $listId);
        }

        return Inertia::render('Dashboard', [
            'tasks' => $tasksQuery->get(),
            'selectedListId' => $listId ? (int) $listId : null,
        ]);
    }
}
