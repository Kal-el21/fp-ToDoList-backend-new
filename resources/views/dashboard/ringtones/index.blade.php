@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Ringtone</h1>

    @if ($ringtones->count())
        <div class="row">
            @foreach ($ringtones as $ringtone)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $ringtone->name }}</h5>
                            <audio controls class="mt-auto">
                                <source src="{{ asset('storage/ringtones/' . $ringtone->file_path) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung pemutar audio.
                            </audio>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Belum ada ringtone yang tersedia.</p>
    @endif
</div>
@endsection
