@extends('layouts.app')

@section('title', 'Rapat Sedang Berlangsung')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Rapat Sedang Berlangsung</h1>
            <p class="mt-1 text-sm text-slate-500">Pilih rapat untuk melanjutkan proses pemindaian.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
    </div>

    <div class="mt-6 space-y-4">
        @forelse ($meetings as $meeting)
            <a href="{{ route('admin.meetings.scan', $meeting) }}"
                class="flex items-center justify-between rounded-2xl bg-white p-5 shadow transition hover:shadow-lg">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">{{ $meeting->title }}</h2>
                    <p class="mt-1 text-sm text-slate-500">{{ $meeting->time->format('d M Y H:i') }} &middot; {{ $meeting->location }}</p>
                </div>
                <span class="text-sm font-medium text-slate-500">Mulai Scan &rarr;</span>
            </a>
        @empty
            <div class="rounded-2xl bg-white p-6 text-center text-sm text-slate-500 shadow">
                Belum ada rapat yang berstatus ongoing.
            </div>
        @endforelse
    </div>
@endsection

