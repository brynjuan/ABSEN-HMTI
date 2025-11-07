@extends('layouts.app')

@section('title', 'Riwayat Rapat')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Riwayat Rapat</h1>
            <p class="mt-1 text-sm text-slate-500">Lihat detail kehadiran setiap rapat dan unduh laporan PDF.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
    </div>

    <div class="mt-6 space-y-4">
        @forelse ($meetings as $meeting)
            <a href="{{ route('admin.reports.show', $meeting) }}"
                class="flex items-center justify-between rounded-2xl bg-white p-5 shadow transition hover:shadow-lg">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">{{ $meeting->title }}</h2>
                    <p class="mt-1 text-sm text-slate-500">{{ $meeting->time->format('d M Y H:i') }} &middot; {{ $meeting->location }}</p>
                </div>
                <span class="text-sm font-medium text-slate-500">Lihat Detail &rarr;</span>
            </a>
        @empty
            <div class="rounded-2xl bg-white p-6 text-center text-sm text-slate-500 shadow">
                Belum ada data rapat.
            </div>
        @endforelse
    </div>
@endsection

