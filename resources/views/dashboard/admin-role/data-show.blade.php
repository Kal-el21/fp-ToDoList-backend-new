@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Pengguna: {{ $user->name }}</h3>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
    <p><strong>Total Task:</strong> {{ $tasks->count() }}</p>

    <hr>

    <h5>Daftar Task</h5>
    @if($tasks->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        <th>Reminder</th>
                        <th>Prioritas</th>
                        <th>Warna</th>
                        <th>Ringtone</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $index => $task)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ ucfirst($task->status) }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ $task->reminder_at }}</td>
                            <td>{{ ucfirst($task->priority) }}</td>
                            <td>
                                <span style="display:inline-block;width:20px;height:20px;background-color:{{ $task->color }};"></span>
                            </td>
                            <td>{{ $task->ringtone->name ?? '-' }}</td>
                            <td>
                                @foreach ($task->categories as $category)
                                    <span class="badge bg-info text-dark">{{ $category->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">Pengguna ini belum memiliki task.</p>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
@endsection
