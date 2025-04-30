@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kategori</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">+ Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @forelse($categories as $category)
            <li class="list-group-item">{{ $category->name }}</li>
        @empty
            <li class="list-group-item text-muted">Belum ada kategori.</li>
        @endforelse
    </ul>
</div>
@endsection
