<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
//    public function index()
//    {
//        $tasks = Task::orderBy('created_at', 'desc')->get();
//
//        return Inertia::render('tasks/Index', [
//            'tasks' => $tasks,
//        ]);
//    }
//
//    public function store(StoreTaskRequest $request)
//    {
//        $validated = $request->validated();
//
//        $task = Task::create($validated);
//
//        return redirect()->back();
//    }
}
