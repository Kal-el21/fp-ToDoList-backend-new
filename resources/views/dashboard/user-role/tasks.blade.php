@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4">My Tasks</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $priorities = ['high' => 'Tinggi', 'medium' => 'Sedang', 'low' => 'Rendah'];
    @endphp

    {{-- Tugas berdasarkan prioritas --}}
    @foreach ($priorities as $key => $label)
        @php
            $filteredTasks = $tasks->where('priority', $key)->where('status', '!=', 'completed');
        @endphp

        @if ($filteredTasks->count())
            <h3 class="mt-4 mb-3">{{ $label }} Priority</h3>
            <div class="row">
                @foreach ($filteredTasks as $task)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm" style="border-left: 5px solid {{ $task->color ?? '#000' }};">
                            <div class="card-body">
                                <h5 class="card-title">{{ $task->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Due: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y H:i') }}
                                </h6>
                                <p class="card-text">{{ $task->description ?? 'No description.' }}</p>

                                {{-- Categories --}}
                                @if ($task->categories->count())
                                    <p>
                                        <strong>Kategori:</strong>
                                        @foreach ($task->categories as $category)
                                            <span class="badge bg-info text-dark">{{ $category->name }}</span>
                                        @endforeach
                                    </p>
                                @endif

                                {{-- Ringtone --}}
                                @if ($task->ringtone)
                                    <p><strong>Ringtone:</strong> {{ $task->ringtone->name }}</p>
                                    <audio controls style="width: 100%;">
                                        <source src="{{ asset('storage/ringtones/' . $task->ringtone->file_path) }}" type="audio/mpeg">
                                        Browser Anda tidak mendukung elemen audio.
                                    </audio>
                                @endif

                                {{-- Reminder --}}
                                @if ($task->reminder_at)
                                    <p class="mt-2 text-warning">
                                        <i class="fas fa-bell"></i>
                                        Reminder at: {{ \Carbon\Carbon::parse($task->reminder_at)->format('d M Y H:i') }}
                                    </p>
                                    @if ($task->reminder_sent)
                                        <span class="badge bg-success">Reminder Sent</span>
                                    @else
                                        <span class="badge bg-danger">Reminder Pending</span>
                                    @endif
                                @endif

                                {{-- Status --}}
                                <p class="mt-2">
                                    <strong>Status:</strong>
                                    <span class="badge
                                        @if($task->status === 'completed') bg-success
                                        @elseif($task->status === 'in_progress') bg-warning text-dark
                                        @else bg-secondary @endif">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                </p>

                                {{-- Tombol tandai selesai --}}
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-outline-success w-100" type="submit">
                                        ✅ Tandai Selesai
                                    </button>
                                </form>

                                {{-- Tombol Edit --}}
                                {{-- <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-primary w-100 mt-2">
                                    ✏️ Edit Task
                                </a> --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach

    {{-- Tugas yang sudah selesai --}}
    @php
        $completedTasks = $tasks->where('status', 'completed');
    @endphp

    @if ($completedTasks->count())
        <h3 class="mt-5 mb-3">✅ Completed Tasks</h3>
        <div class="row">
            @foreach ($completedTasks as $task)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm border-success">
                        <div class="card-body">
                            <h5 class="card-title text-decoration-line-through">{{ $task->title }}</h5>
                            <p class="card-text">{{ $task->description ?? 'No description.' }}</p>
                            <p class="text-muted mb-1">
                                Completed on: {{ \Carbon\Carbon::parse($task->updated_at)->format('d M Y H:i') }}
                            </p>
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus task ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm w-100" type="submit">
                                    🗑️ Hapus Task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Jika tidak ada task sama sekali --}}
    @if (!$tasks->count())
        <p class="text-muted">You don't have any tasks yet.</p>
    @endif
</div>

@endsection
