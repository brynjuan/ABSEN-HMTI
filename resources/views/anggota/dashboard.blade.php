@extends('layouts.app')

@section('title', 'Dashboard Anggota')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-2xl bg-white p-6 shadow">
            <div class="text-sm font-medium text-slate-500">Total Kehadiran</div>
            <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $attendanceCount }}</div>
        </div>
        <div class="rounded-2xl bg-white p-6 shadow lg:col-span-2">
            <h2 class="text-lg font-semibold text-slate-900">Rapat Berlangsung</h2>
            <ul class="mt-3 space-y-3 text-sm text-slate-600">
                @forelse ($upcomingMeetings as $meeting)
                    <li class="rounded-xl border border-slate-200 p-4">
                        <div class="font-medium text-slate-900">{{ $meeting->title }}</div>
                        <div class="mt-1">{{ $meeting->time->format('d M Y H:i') }} &middot; {{ $meeting->location }}</div>
                    </li>
                @empty
                    <li class="rounded-xl border border-dashed border-slate-300 p-4 text-center">Belum ada rapat yang
                        berlangsung.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2">
        <a href="{{ route('anggota.qr') }}"
            class="flex items-center justify-between rounded-2xl bg-slate-900 px-6 py-5 text-white shadow transition hover:bg-slate-700">
            <div>
                <div class="text-lg font-semibold">QR Code Saya</div>
                <p class="mt-1 text-sm text-slate-200">Tampilkan QR code untuk proses absensi.</p>
            </div>
            <span class="text-3xl">&#128273;</span>
        </a>

        <a href="{{ route('anggota.history') }}"
            class="flex items-center justify-between rounded-2xl bg-white px-6 py-5 shadow transition hover:shadow-lg">
            <div>
                <div class="text-lg font-semibold text-slate-900">History Rapat</div>
                <p class="mt-1 text-sm text-slate-500">Lihat riwayat rapat yang pernah Anda ikuti.</p>
            </div>
            <span class="text-3xl text-slate-400">&#128214;</span>
        </a>
    </div>
@endsection

