@extends('layouts.app')

@section('title', 'Profil Admin')

@section('content')
    <div class="max-w-3xl">
        <h1 class="text-2xl font-semibold text-slate-900">Profil Admin</h1>
        <p class="mt-1 text-sm text-slate-500">Perbarui kredensial akun administrator.</p>

        <form method="POST" action="{{ route('admin.profile.update') }}"
            class="mt-6 space-y-5 rounded-2xl bg-white p-8 shadow">
            @csrf
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300" />
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700" for="password">Password Baru</label>
                <input type="password" name="password" id="password"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-300"
                    placeholder="Biarkan kosong jika tidak ingin mengubah" />
            </div>
            <button type="submit"
                class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                Update Profil
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-6 inline-block">
            @csrf
            <button type="submit"
                class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
                Logout
            </button>
        </form>
    </div>
@endsection

