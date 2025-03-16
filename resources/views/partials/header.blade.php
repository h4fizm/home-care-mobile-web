<header class="bg-white shadow-md p-5 flex justify-between items-center">
  <h1 class="font-bold text-lg">Home Care</h1>
  <div class="flex items-center space-x-3">
    <!-- Nama Header Berikan Pembatasan Karakter 8 Maks -->
    @auth
        <span class="text-sm font-medium text-gray-600">
            {{ Str::limit(auth()->user()->name, 6, '..') }}
        </span>
    @endauth
    <a href="{{ url('profil') }}">
        <img src="{{ asset('assets/img/user.png') }}" alt="Profile" class="w-10 h-10 rounded-full cursor-pointer" />
    </a>
  </div>
</header>
