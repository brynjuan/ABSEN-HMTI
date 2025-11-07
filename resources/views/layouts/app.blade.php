<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') |
        @endif
        Absensi Rapat
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-slate-900 text-white flex items-center justify-center font-semibold">
                            AR
                        </div>
                        <div class="text-lg font-semibold">Absensi Rapat</div>
                    </div>
                    <div class="flex items-center gap-6">
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Home</a>
                                <a href="{{ route('admin.members.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Users</a>
                                <a href="{{ route('admin.profile.show') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Profil</a>
                            @else
                                <a href="{{ route('anggota.dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Home</a>
                                <a href="{{ route('anggota.contact') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Contact</a>
                                <a href="{{ route('anggota.profile.show') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Profil</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}" class="hidden" id="logout-form">
                                @csrf
                            </form>
                            <button type="button" onclick="document.getElementById('logout-form').submit();"
                                class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-medium text-white hover:bg-slate-700">
                                Logout
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-1">
            <div class="max-w-7xl mx-auto w-full px-4 py-6 sm:px-6 lg:px-8">
                @if (session('success') && ! $__env->hasSection('suppress-success'))
                    <div id="success-alert" class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert">
                        <div class="font-semibold mb-2">Terjadi kesalahan:</div>
                        <ul class="list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="bg-white py-6 shadow-inner">
            <div class="max-w-7xl mx-auto px-4 text-center text-sm text-slate-500">
                &copy; {{ date('Y') }} Absensi Rapat HMTI. All rights reserved.
            </div>
        </footer>
    </div>

    @yield('scripts')
</body>

</html>

