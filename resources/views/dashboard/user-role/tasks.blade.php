@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4">My Tasks</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($tasks->count())
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" style="border-left: 5px solid {{ $task->color ?? '#000' }};">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Due: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y H:i') }}
                            </h6>
                            <p class="card-text">{{ $task->description ?? 'No description.' }}</p>

                            <p><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>

                            @if ($task->categories->count())
                                <p><strong>Categories:</strong>
                                    @foreach ($task->categories as $category)
                                        <span class="badge bg-info">{{ $category->name }}</span>
                                    @endforeach
                                </p>
                            @endif

                            @if ($task->ringtone)
                                <p><strong>Ringtone:</strong> {{ $task->ringtone->name }}</p>
                                <audio controls style="width: 100%;">
                                    <source src="{{ asset('storage/ringtones/' . $task->ringtone->file_path) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @endif

                            @if ($task->reminder_at)
                                <p class="mt-2 text-warning"><i class="fas fa-bell"></i> Reminder at: {{ \Carbon\Carbon::parse($task->reminder_at)->format('d M Y H:i') }}</p>
                                @if ($task->reminder_sent)
                                    <span class="badge bg-success">Reminder Sent</span>
                                @else
                                    <span class="badge bg-danger">Reminder Pending</span>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">You don't have any tasks yet.</p>
    @endif
</div>

@endsection
