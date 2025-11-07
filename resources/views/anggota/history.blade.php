@extends('layouts.app')

@section('title', 'Riwayat Kehadiran')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Riwayat Kehadiran</h1>
            <p class="mt-1 text-sm text-slate-500">Daftar rapat yang pernah Anda hadiri.</p>
        </div>
        <a href="{{ route('anggota.dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-2xl bg-white shadow">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Waktu</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Lokasi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse ($meetings as $meeting)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $meeting->title }}</td>
                        <td class="px-4 py-3">{{ $meeting->time->format('d M Y H:i') }}</td>
                        <td class="px-4 py-3">{{ $meeting->location }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-sm text-slate-500">Belum ada riwayat kehadiran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

