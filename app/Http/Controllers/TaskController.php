<?php

namespace App\Http\Controllers;

use App\Http\Resources\FailedRow\FailedRowResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\FailedRow;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['user', 'file'])->withCount('failedRows')->paginate(5);
//        $tasks = TaskResource::collection($tasks);
        return inertia('Task/Index', compact('tasks'));
    }

//    public function failedList(Task $task)
//    {
//        $failedRows = FailedRow::with(['task'])->paginate(10);
//        $failedList = FailedRowResource::collection($failedRows);
//
//        return inertia('Task/FailedList', compact('failedList'));
//    }
}
