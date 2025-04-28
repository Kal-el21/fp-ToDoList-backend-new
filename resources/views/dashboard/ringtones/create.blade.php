@extends('layouts.app')
@section('content')

<div class="col-12">
  <div class="card mb-4">
    <div class="card-header"><strong>Tambah Ringtone</strong></div>
    <div class="card-body">

      <form action="{{ route('ringtones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Ringtone --}}
        <div class="mb-3">
          <label for="name" class="form-label">Nama Ringtone</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        {{-- File Ringtone --}}
        <div class="mb-3">
          <label for="file" class="form-label">File Ringtone (.mp3)</label>
          <input type="file" name="file" class="form-control" accept="audio/mpeg" required onchange="previewRingtone(event)">
        </div>

       {{--  --}}
        <div class="mb-3" id="audio-preview-container" style="display: none;">
          <label class="form-label">Preview Ringtone:</label>
          <audio id="audio-preview" controls></audio>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Simpan Ringtone</button>
      </form>

    </div>
  </div>
</div>

{{-- Javascript untuk preview audio --}}
<script>
function previewRingtone(event) {
    const file = event.target.files[0];
    const audioPreview = document.getElementById('audio-preview');
    const container = document.getElementById('audio-preview-container');

    if (file) {
        const url = URL.createObjectURL(file);
        audioPreview.src = url;
        container.style.display = 'block';
    } else {
        audioPreview.src = '';
        container.style.display = 'none';
    }
}
</script>

@endsection
