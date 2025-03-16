@extends('index')
@section('title', 'Laman Pengukuran')
@section('content')
<main class="flex-1 overflow-auto p-5 space-y-4">

    <!-- Informasi Pasien -->
    <div class="bg-rose-200 p-3 rounded-lg">
        <h2 class="font-bold text-md mb-2">Informasi Pasien</h2>
        <div class="grid grid-cols-[auto_30px_1fr] gap-y-1 text-sm">
            <p class="font-semibold text-left">Nama</p>
            <p class="text-center">:</p>
            <p class="text-left">{{ Auth::user()->name }}</p>
            <p class="font-semibold text-left">Umur</p>
            <p class="text-center">:</p>
            <p class="text-left">{{ $measurement->age }} Tahun</p>
            <p class="font-semibold text-left">Jenis Kelamin</p>
            <p class="text-center">:</p>
            <p class="text-left">{{ $measurement->gender }}</p>
        </div>
    </div>

    @if(optional($measurement)->created_at)
        <p class="text-xs text-gray-600 mt-2">
            <span class="text-red-600 font-bold">*</span> Hasil pengukuran terakhir
            <span class="text-red-600 font-semibold">
                {{ \Carbon\Carbon::parse($measurement->created_at)->setTimezone('Asia/Jakarta')->isoFormat('dddd, D MMMM Y HH:mm') }} 
            </span>
        </p>
    @endif


    <!-- Cards -->
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
            <div class="bg-green-200 p-2 rounded-full">
                <span class="text-green-700 text-[10px] font-bold uppercase">Sistolik</span>
            </div>
            <div class="flex flex-col items-center mt-2">
                <p class="text-sm font-bold text-gray-800">{{ $measurement->sistolik }}</p>
                <p class="text-xs text-gray-500">mmHg</p>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
            <div class="bg-blue-200 p-2 rounded-full">
                <span class="text-blue-700 text-[10px] font-bold uppercase">Diastolik</span>
            </div>
            <div class="flex flex-col items-center mt-2">
                <p class="text-sm font-bold text-gray-800">{{ $measurement->diastolik }}</p>
                <p class="text-xs text-gray-500">mmHg</p>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
            <div class="bg-red-200 p-2 rounded-full flex items-center justify-center">
                <span class="text-red-700 text-lg">❤️</span>
            </div>
            <div class="flex flex-col items-center mt-2">
                <p class="text-sm font-bold text-gray-800">{{ $measurement->bpm }}</p>
                <p class="text-xs text-gray-500">BPM</p>
            </div>
        </div>
    </div>

    <!-- Status Hipertensi -->
    @php
        if($measurement->sistolik === '-' || $measurement->diastolik === '-') {
            $status = "Tidak Diketahui";
            $bgColor = "bg-gray-500"; // Warna abu-abu
        } elseif($measurement->sistolik >= 140 || $measurement->diastolik >= 90) {
            $status = "Hipertensi";
            $bgColor = "bg-red-600"; // Warna merah
        } elseif($measurement->sistolik < 90 || $measurement->diastolik < 60) {
            $status = "Hipotensi";
            $bgColor = "bg-yellow-500"; // Warna kuning
        } else {
            $status = "Normal";
            $bgColor = "bg-green-600"; // Warna hijau
        }
    @endphp

    <div class="{{ $bgColor }} text-white p-3 rounded-lg font-bold text-center">
        {{ $status }}
    </div>

    <!-- Cara Penyembuhan -->
    <div class="bg-pink-100 p-4 rounded-lg">
        <h2 class="font-bold text-sm mb-2">Cara Penyembuhan</h2>
        @if($measurement->sistolik === '-')
            <p class="text-justify text-sm">Belum ada data pengukuran. Silakan lakukan pengukuran terlebih dahulu.</p>
        @elseif($status == "Hipertensi")
            <p class="text-justify text-sm">Penyembuhan Hipertensi : Kurangi konsumsi garam, olahraga teratur, dan kelola stres.</p>
        @elseif($status == "Hipotensi")
            <p class="text-justify text-sm">Penyembuhan Hipotensi : Konsumsi lebih banyak cairan, garam secukupnya, dan hindari berdiri terlalu lama.</p>
        @else
            <p class="text-justify text-sm">Jaga pola hidup sehat untuk mempertahankan tekanan darah normal.</p>
        @endif
    </div>
</main>
@endsection
