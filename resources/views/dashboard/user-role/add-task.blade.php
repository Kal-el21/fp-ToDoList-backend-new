@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Add Task</strong><span class="small ms-1">Custom select</span></div>
      <div class="card-body">
        <div class="example">
          <div class="tab-content rounded-bottom">
            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1009">

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    {{-- Title --}}
                    <div class="input-group mb-3">
                      <span class="input-group-text">@</span>
                      <input type="text" class="form-control" name="title" placeholder="Judul Task" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                      <label class="form-label">Deskripsi</label>
                      <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    {{-- Category (Multiple Select) --}}
                    <div class="input-group mb-3">
                      <label class="input-group-text">Kategori</label>
                      <select class="form-select" name="categories[]" multiple>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    {{-- Deadline / Due Date --}}
                    <div class="input-group mb-3">
                      <label class="input-group-text">Deadline</label>
                      <input type="datetime-local" class="form-control" name="due_date" required>
                    </div>

                    {{-- Reminder --}}
                    <div class="input-group mb-3">
                      <label class="input-group-text">Pengingat</label>
                      <input type="datetime-local" class="form-control" name="reminder_at">
                    </div>

                    {{-- Priority --}}
                    <div class="input-group mb-3">
                      <label class="input-group-text">Prioritas</label>
                      <select class="form-select" name="priority">
                        <option value="low">Rendah</option>
                        <option value="medium" selected>Sedang</option>
                        <option value="high">Tinggi</option>
                      </select>
                    </div>

                    {{-- Ringtone --}}
                    <div class="input-group mb-3">
                      <label class="input-group-text">Ringtone</label>
                      <select class="form-select" name="ringtone_id">
                        <option value="">Default</option>
                        @foreach($ringtones as $ringtone)
                          <option value="{{ $ringtone->id }}">{{ $ringtone->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    {{-- Color --}}
                    <div class="input-group mb-3">
                      <label class="input-group-text">Warna</label>
                      <input type="color" class="form-control form-control-color" name="color" value="#563d7c">
                    </div>

                    {{-- Status (optional: hidden or select) --}}
                    <input type="hidden" name="status" value="pending">

                    {{-- Submit --}}
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Tambah Task</button>
                    </div>
                  </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
