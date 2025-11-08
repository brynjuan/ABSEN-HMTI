@extends('layouts.app')

@section('title', 'Bua Rapat Baru')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Buat Rapat Baru</h1>
            <p class="mt-1 text-sm text-slate-500">Isi informasi rapat untuk memulai sesi absensi.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
    </div>

    <form method="POST" action="{{ route('admin.meetings.store') }}" class="mt-6 space-y-5 rounded-2xl bg-white p-8 shadow">
        @csrf
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="title">Judul Rapat</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="time">Waktu</label>
            <input type="datetime-local" name="time" id="time" value="{{ old('time') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="location">Lokasi</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="description">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300">{{ old('description') }}</textarea>
        </div>
        <button type="submit"
            class="w-full rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
            Simpan dan Mulai Scan
        </button>
    </form>
@endsection

