<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // hanya ambil task user login
        $tasks = Task::where('user_id', $user->id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'reminder_at' => 'nullable|date',
            'color' => 'nullable|string|max:20',
            'priority' => 'nullable|string|in:low,medium,high',
            'ringtone_id' => 'nullable|exists:ringtones,id',
        ]);

        $task = $request->user()->tasks()->create($validated);
        return response()->json([
            'status' => 'success',
            'data' => $task
        ]);
    }

    public function show($id, Request $request)
    {
        $task = Task::findOrFail($id);

        if ($request->user()->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'status' => 'success',
            'data' => $task
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($request->user()->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $task
        ]);
    }

    public function destroy($id, Request $request)
    {
        $task = Task::findOrFail($id);

        if ($request->user()->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted'
        ]);
    }


}
