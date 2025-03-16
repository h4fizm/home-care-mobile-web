@extends('index')
@section('title', 'Laman Riwayat Pengukuran')
@section('content')

<main class="flex-1 overflow-auto pt-5 pb-10">
    <div class="max-w-md mx-auto space-y-6 p-4">

        @foreach ($measurements as $measurement)
            @php
                // Menentukan status kesehatan berdasarkan sistolik dan diastolik
                if ($measurement->sistolik === '-' || $measurement->diastolik === '-') {
                    $status = "Tidak Diketahui";
                    $bgColor = "bg-gray-500"; // Warna abu-abu
                } elseif ($measurement->sistolik >= 140 || $measurement->diastolik >= 90) {
                    $status = "Hipertensi";
                    $bgColor = "bg-red-600"; // Warna merah
                } elseif ($measurement->sistolik < 90 || $measurement->diastolik < 60) {
                    $status = "Hipotensi";
                    $bgColor = "bg-yellow-500"; // Warna kuning
                } else {
                    $status = "Normal";
                    $bgColor = "bg-green-600"; // Warna hijau
                }
            @endphp

            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl">🧑‍⚕️</div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $measurement->age }} Tahun | {{ ucfirst($measurement->gender) }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-sm text-gray-600">
                        <p class="font-medium">Sistolik</p>
                        <p class="text-lg font-semibold">{{ $measurement->sistolik }} mmHg</p>
                    </div>
                    <div class="text-sm text-gray-600">
                        <p class="font-medium">Diastolik</p>
                        <p class="text-lg font-semibold">{{ $measurement->diastolik }} mmHg</p>
                    </div>
                    <div class="text-sm text-gray-600">
                        <p class="font-medium">BPM</p>
                        <p class="text-lg font-semibold">{{ $measurement->bpm }}</p>
                    </div>
                    <div class="text-sm text-gray-600 col-span-2">
                        <p class="font-medium">Status</p>
                        <span class="{{ $bgColor }} text-white px-3 py-1 rounded-full text-sm font-semibold inline-block mt-1">
                            {{ $status }}
                        </span>
                    </div>
                </div>
                <div class="text-xs text-gray-500 mt-4 flex items-center space-x-2">
                    <span>⏳</span>
                    <p>{{ \Carbon\Carbon::parse($measurement->created_at)->translatedFormat('l, d F Y , H:i ') }}</p>
                </div>
            </div>
        @endforeach

        @if ($measurements->isEmpty())
            <p class="text-center text-gray-500">Belum ada data riwayat pengukuran.</p>
        @endif

    </div>
</main>

@endsection
