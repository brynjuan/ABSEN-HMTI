@extends('layouts.app')

@section('title', 'Detail Laporan Rapat')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">{{ $meeting->title }}</h1>
            <p class="mt-1 text-sm text-slate-500">Detail kehadiran rapat.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.reports.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
            <a href="{{ route('admin.reports.pdf', $meeting) }}"
                class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Download PDF</a>
        </div>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow">
        <dl class="grid gap-6 md:grid-cols-2">
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wider text-slate-500">Waktu</dt>
                <dd class="mt-2 text-sm text-slate-900">{{ $meeting->time->format('d M Y H:i') }}</dd>
            </div>
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wider text-slate-500">Lokasi</dt>
                <dd class="mt-2 text-sm text-slate-900">{{ $meeting->location }}</dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-xs font-semibold uppercase tracking-wider text-slate-500">Deskripsi</dt>
                <dd class="mt-2 text-sm text-slate-900">{{ $meeting->description ?? '-' }}</dd>
            </div>
        </dl>
    </div>

    <div class="mt-6 overflow-hidden rounded-2xl bg-white shadow">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">NIM</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Prodi</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tahun Angkatan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse ($meeting->attendees as $attendee)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $attendee->name }}</td>
                        <td class="px-4 py-3">{{ $attendee->nim }}</td>
                        <td class="px-4 py-3">{{ $attendee->prodi }}</td>
                        <td class="px-4 py-3">{{ $attendee->tahun_angkatan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">Belum ada anggota yang hadir.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

