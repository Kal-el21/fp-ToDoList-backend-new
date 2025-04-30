@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Ringtone</h1>

    <form action="{{ route('ringtones.update', $ringtone->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Ringtone --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Ringtone</label>
            <input type="text" name="name" class="form-control" value="{{ $ringtone->name }}" required>
        </div>

        {{-- File Baru (opsional) --}}
        <div class="mb-3">
            <label for="file" class="form-label">Ganti File Ringtone (Optional)</label>
            <input type="file" name="file" class="form-control" accept="audio/mpeg">
        </div>

        <button type="submit" class="btn btn-primary">Update Ringtone</button>
    </form>
</div>
@endsection
