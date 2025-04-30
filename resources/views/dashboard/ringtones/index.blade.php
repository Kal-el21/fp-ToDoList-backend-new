@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Ringtone</h1>

    {{-- Search & Sort --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('ringtones.index') }}" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari ringtone..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div class="col-md-6 text-md-end mt-2 mt-md-0">
            <form method="GET" action="{{ route('ringtones.index') }}" class="d-flex justify-content-md-end">
                <select name="sort" onchange="this.form.submit()" class="form-select w-auto">
                    <option value="">Urutkan</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A-Z</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Z-A</option>
                </select>
            </form>
        </div>
    </div>

    {{-- Table --}}
    @if ($ringtones->count())
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ringtone</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ringtones as $index => $ringtone)
                        <tr>
                            <td>{{ ($ringtones->currentPage() - 1) * $ringtones->perPage() + $index + 1 }}</td>
                            <td>{{ $ringtone->name }}</td>
                            <td>
                                <audio controls style="width: 150px;">
                                    <source src="{{ asset('storage/' . $ringtone->file_path) }}" type="audio/mpeg">
                                    Browser tidak mendukung audio.
                                </audio>
                            </td>
                            <td>{{ $ringtone->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('ringtones.edit', $ringtone->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteRingtone({{ $ringtone->id }})">Hapus</button>

                                    {{-- Form Delete --}}
                                    <form id="delete-form-{{ $ringtone->id }}" action="{{ route('ringtones.destroy', $ringtone->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $ringtones->links() }}
        </div>
    @else
        <p class="text-muted">Belum ada ringtone yang tersedia.</p>
    @endif
</div>

{{-- SweetAlert Delete Confirmation --}}
<script>
    function deleteRingtone(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Ringtone akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
