<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withCount('tasks')->get();

        // Ambil jumlah task per hari selama 30 hari terakhir
        $taskStats = DB::table('tasks')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        // Siapkan data array lengkap untuk 30 hari terakhir (agar hari tanpa task tetap tampil)
        $dates = collect();
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $dates->put($date, 0);
        }

        foreach ($taskStats as $stat) {
            $dates->put($stat->date, $stat->total);
        }

        return view('dashboard.admin-role.index', [
            'users' => $users,
            'taskChartLabels' => $dates->keys(),
            'taskChartData' => $dates->values(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Menampilkan semua task milik user tersebut dengan relasi
        $tasks = $user->tasks()
            ->with(['ringtone', 'categories'])
            ->latest()
            ->get();

        return view('dashboard.admin-role.data-show', compact('user', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,user'
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
