@extends('layouts.app')

@section('title', 'Scan Absensi')

@section('content')
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Scan Absensi</h1>
            <p class="mt-1 text-sm text-slate-500">Gunakan kamera untuk memindai QR code anggota.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.meetings.ongoing') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
            <form method="POST" action="{{ route('admin.meetings.finish', $meeting) }}">
                @csrf
                <button type="submit"
                    class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    Akhiri Rapat
                </button>
            </form>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl bg-white p-6 shadow">
            <h2 class="text-xl font-semibold text-slate-900">Detail Rapat</h2>
            <dl class="mt-4 space-y-3 text-sm text-slate-600">
                <div>
                    <dt class="font-medium text-slate-500">Judul</dt>
                    <dd class="text-slate-900">{{ $meeting->title }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Waktu</dt>
                    <dd class="text-slate-900">{{ $meeting->time->format('d M Y H:i') }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Lokasi</dt>
                    <dd class="text-slate-900">{{ $meeting->location }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Deskripsi</dt>
                    <dd class="text-slate-900">{{ $meeting->description ?? '-' }}</dd>
                </div>
            </dl>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow">
            <div id="scan-message" class="hidden rounded-lg px-4 py-3 text-sm"></div>
            <div id="qr-reader" class="mt-4 overflow-hidden rounded-xl border border-slate-200"></div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/scan.js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.renderMeetingScanner) {
                window.renderMeetingScanner({
                    elementId: 'qr-reader',
                    endpoint: '{{ route('admin.meetings.scan.store', $meeting) }}',
                    messageContainerId: 'scan-message'
                });
            }
        });
    </script>
@endsection

