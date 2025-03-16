@extends('index')
@section('title', 'Laman Edit Profil')
@section('content')

<!-- Scrollable Content -->
<main class="flex-1 overflow-auto p-5 space-y-4">
    <!-- Foto Profil -->
    <div class="flex flex-col items-center mb-5 text-center">
        <img
            src="{{ asset('assets/img/user.png') }}"
            alt="Profile"
            class="w-24 h-24 rounded-full shadow-md"
        />
        <h2 class="mt-3 font-bold text-xl">{{ auth()->user()->name }}</h2>
    </div>

    <!-- Form Edit Profil -->
    <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h3 class="text-center font-semibold mb-3">Edit Profil</h3>
        
        <!-- Notifikasi Jika Berhasil -->
        @if (session('success'))
            <div class="p-3 mb-3 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profil.update') }}" method="POST" class="space-y-3">
            @csrf

            <div>
                <label class="block text-left text-sm font-medium text-gray-600">Nama</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', auth()->user()->name) }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Nama Anda"
                />
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-left text-sm font-medium text-gray-600">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Email Anda"
                />
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-left text-sm font-medium text-gray-600">Password Baru (Opsional)</label>
                <input
                    type="password"
                    name="password"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="********"
                />
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700"
            >
                Simpan Perubahan
            </button>
        </form>
    </div>
</main>

@endsection
