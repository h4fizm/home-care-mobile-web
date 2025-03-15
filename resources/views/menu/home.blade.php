<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pengukuran</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="w-screen h-screen flex flex-col bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md p-5 flex justify-between items-center">
      <h1 class="font-bold text-lg">Home Care</h1>
      <div class="flex items-center space-x-3">
        <!-- Nama Header Berikan Pembatasan Karakter 8 Maks -->
        <span class="text-sm font-medium text-gray-600">Admin</span>
            <a href="{{ url('profil') }}">
                <img src="{{ asset('assets/img/user.png') }}" alt="Profile" class="w-10 h-10 rounded-full cursor-pointer" />
            </a>
      </div>
    </header>

    <!-- Scrollable Content -->
    <main class="flex-1 overflow-auto p-5 space-y-4">
      <!-- Form Pengukuran -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h3 class="text-center font-semibold mb-3">Form Pengisian Data</h3>
        <form action="#" method="POST" class="space-y-3">
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Nama</label
            >
            <input
              type="text"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Masukkan Nama"
            />
          </div>
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Umur</label
            >
            <input
              type="number"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Masukkan Umur"
            />
          </div>
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Jenis Kelamin</label
            >
            <select
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Sistolik (mmHg)</label
            >
            <input
              type="number"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Masukkan Sistolik"
            />
          </div>
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Diastolik (mmHg)</label
            >
            <input
              type="number"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Masukkan Diastolik"
            />
          </div>
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Denyut Jantung</label
            >
            <input
              type="number"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Masukkan Denyut"
            />
          </div>
          <button
            type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700"
          >
            Submit Data
          </button>
        </form>
      </div>
    </main>

    <!-- Bottom Navigation -->
    <nav class="bg-white p-2 shadow-md flex justify-around text-xs">
      <a
        href="index.html"
        class="flex flex-col items-center w-20 py-2 bg-indigo-200 text-indigo-700 rounded-lg"
      >
        <span class="text-lg">📦</span> <span>Home</span>
      </a>
      <a
        href="pengukuran.html"
        class="flex flex-col items-center w-20 py-2 text-gray-500"
      >
        <span class="text-lg">📏</span> <span>Pengukuran</span>
      </a>
      <a
        href="riwayat.html"
        class="flex flex-col items-center w-20 py-2 text-gray-500"
      >
        <span class="text-lg">📅</span> <span>Riwayat</span>
      </a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="flex flex-col items-center w-20 py-2 text-gray-500">
            <span class="text-lg">🚪</span>
            <span>Logout</span>
        </button>
      </form>
    </nav>
  </body>
</html>
