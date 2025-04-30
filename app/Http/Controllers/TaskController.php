<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ringtone;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->with('categories', 'ringtone')->orderBy('due_date', 'asc')->get();
        return view('dashboard.user-role.tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $ringtones = Ringtone::where('user_id', Auth::id())->orWhereNull('user_id')->get();
        return view('dashboard.user-role.add-task', compact('categories', 'ringtones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'reminder_at' => 'nullable|date',
            'color' => 'nullable|string',
            'priority' => 'nullable|in:low,medium,high',
            'ringtone_id' => 'nullable|exists:ringtones,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $task = Auth::user()->tasks()->create($request->only([
            'title', 'description', 'due_date', 'reminder_at', 'color', 'priority', 'ringtone_id', 'status'
        ]));

        $task->categories()->sync($request->categories);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('categories', 'ringtone')->findOrFail($id);
        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        $categories = Category::all();
        $ringtones = Ringtone::where('user_id', Auth::id())->orWhereNull('user_id')->get();
        return view('tasks.edit', compact('task', 'categories', 'ringtones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'reminder_at' => 'nullable|date',
            'color' => 'nullable|string',
            'priority' => 'nullable|in:low,medium,high',
            'ringtone_id' => 'nullable|exists:ringtones,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $task->update($request->only([
            'title', 'description', 'due_date', 'reminder_at', 'color', 'priority', 'ringtone_id', 'status'
        ]));

        $task->categories()->sync($request->categories);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * Mark the task as completed.
     */
    public function markAsCompleted(Task $task)
    {
        // Cek apakah task milik user yang login
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $task->status = 'completed';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task ditandai sebagai selesai.');
    }

}
