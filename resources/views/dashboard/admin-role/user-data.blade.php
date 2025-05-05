@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar User</h1>

    @if ($users->count())
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jumlah Task</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->tasks_count }}</td>
                            <td>
                                <a href="{{ route('admin.users.tasks', $user->id) }}" class="btn btn-sm btn-info">Lihat Task</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @else
        <p class="text-muted">Belum ada user yang terdaftar.</p>
    @endif
</div>
@endsection

