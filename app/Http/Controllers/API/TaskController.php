<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->with(['categories', 'ringtone'])->get();
        return response()->json($tasks);
        // return ResponseHelpers::jsonResponse(data: $tasks, status: 'sukses', code:200);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task = $request->user()->tasks()->create($validated);
        return response()->json($task);
    }
}
