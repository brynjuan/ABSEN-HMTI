@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('suppress-success', true)

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Tambah Anggota Baru</h1>
            <p class="mt-1 text-sm text-slate-500">Lengkapi data anggota untuk menghasilkan QR code unik.</p>
        </div>
        <a href="{{ route('admin.members.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Kembali</a>
    </div>

    <form method="POST" action="{{ route('admin.members.store') }}" class="mt-6 grid gap-5 rounded-2xl bg-white p-8 shadow md:grid-cols-2">
        @csrf
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="nim">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="prodi">Program Studi</label>
            <input type="text" name="prodi" id="prodi" value="{{ old('prodi') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="tahun_angkatan">Tahun Angkatan</label>
            <input type="text" name="tahun_angkatan" id="tahun_angkatan" value="{{ old('tahun_angkatan') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700" for="password">Password</label>
            <input type="password" name="password" id="password" required
                class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
        </div>
        <div class="md:col-span-2">
            <button type="submit"
                class="w-full rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                Simpan Anggota
            </button>
        </div>
    </form>

    <div id="successModal" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/30 p-4">
        <div class="relative w-full max-w-md">
            <div class="relative rounded-2xl bg-white p-6 shadow">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Berhasil</h2>
                        <p id="success-modal-message" class="mt-2 text-sm text-slate-600"></p>
                    </div>
                    <button type="button" data-modal-hide
                        class="rounded-full bg-slate-100 p-2 text-slate-500 hover:bg-slate-200">
                        <span class="sr-only">Tutup</span>
                        &#10005;
                    </button>
                </div>
                <div class="mt-6 text-right">
                    <button type="button" data-modal-hide
                        class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const successMessage = @json(session('success'));

            if (successMessage) {
                const modalEl = document.getElementById('successModal');

                if (modalEl) {
                    const modal = window.FlowbiteModal ? new window.FlowbiteModal(modalEl) : null;
                    const messageTarget = document.getElementById('success-modal-message');

                    if (messageTarget) {
                        messageTarget.textContent = successMessage;
                    }

                    modalEl.querySelectorAll('[data-modal-hide]').forEach((button) => {
                        button.addEventListener('click', () => {
                            if (modal) {
                                modal.hide();
                            } else {
                                modalEl.classList.add('hidden');
                                modalEl.classList.remove('flex');
                            }
                        });
                    });

                    if (modal) {
                        modal.show();
                    } else {
                        modalEl.classList.remove('hidden');
                        modalEl.classList.add('flex');
                    }
                }
            }
        });
    </script>
@endsection

