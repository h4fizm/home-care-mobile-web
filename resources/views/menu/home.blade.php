@extends('index')
@section('title', 'Laman Home')
@section('content')

<main class="flex-1 overflow-auto p-5 space-y-4">
  <!-- Card Form Pengukuran -->
  <div class="bg-gray-50 p-4 rounded-lg shadow">
    <h3 class="text-center font-semibold mb-3">Form Pengisian Data</h3>
    <h6 class="text-center text-xs text-gray-400 italic font-extralight mb-3">
      *Isi Informasi untuk Keperluan Pengukuran
    </h6>
    <form action="{{ route('home.store') }}" method="POST" class="space-y-3">
      @csrf
      <!-- Notifikasi Validasi Error -->
      @if ($errors->any())
          <div class="p-3 mb-3 text-sm text-red-700 bg-red-100 rounded-lg">
              <ul class="list-disc list-inside">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div>
        <label class="block text-left text-sm font-medium text-gray-600">Nama</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg bg-gray-200 text-gray-600" value="{{ auth()->user()->name }}" readonly />
      </div>
      <div>
        <label class="block text-left text-sm font-medium text-gray-600">Umur</label>
        <input type="number" name="age" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan Umur" />
      </div>
      <div>
        <label class="block text-left text-sm font-medium text-gray-600">Jenis Kelamin</label>
        <select name="gender" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
  
      <!-- Card Hasil Pengukuran -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h3 class="text-center font-semibold mb-3">Hasil Pengukuran Device</h3>
        <div class="grid grid-cols-3 gap-4">
          <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
            <div class="bg-green-200 p-2 rounded-full">
              <span class="text-green-700 text-[10px] font-bold uppercase">Sistolik</span>
            </div>
            <div class="flex flex-col items-center mt-2">
              <input type="number" name="sistolik" class="w-full text-center px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Masukkan Sistolik" />
              <p class="text-xs text-gray-500">mmHg</p>
            </div>
          </div>
          <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
            <div class="bg-blue-200 p-2 rounded-full">
              <span class="text-blue-700 text-[10px] font-bold uppercase">Diastolik</span>
            </div>
            <div class="flex flex-col items-center mt-2">
              <input type="number" name="diastolik" class="w-full text-center px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Diastolik" />
              <p class="text-xs text-gray-500">mmHg</p>
            </div>
          </div>
          <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
            <div class="bg-red-200 p-2 rounded-full flex items-center justify-center">
              <span class="text-red-700 text-lg">❤️</span>
            </div>
            <div class="flex flex-col items-center mt-2">
              <input type="number" name="bpm" class="w-full text-center px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Masukkan BPM" />
              <p class="text-xs text-gray-500">BPM</p>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Buttons Scan & Submit -->
      <div class="flex justify-between">
        <button type="button" class="w-1/2 bg-gray-600 text-white py-2 rounded-lg hover:bg-gray-700 mr-2">Scan</button>
        <button type="submit" class="w-1/2 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 ml-2">Submit</button>
      </div>
    </form>
  </div>
</main>

@endsection