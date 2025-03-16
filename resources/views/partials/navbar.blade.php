<nav class="bg-white p-2 shadow-md flex justify-around text-xs">
    @php
        $currentRoute = request()->route()->getName();
    @endphp

    <a href="{{ route('home') }}" class="flex flex-col items-center w-20 py-2 rounded-lg {{ $currentRoute == 'home' ? 'bg-indigo-200 text-indigo-700' : 'text-gray-500' }}">
        <span class="text-lg">📦</span> <span>Home</span>
    </a>
    
    <a href="{{ route('pengukuran') }}" class="flex flex-col items-center w-20 py-2 rounded-lg {{ $currentRoute == 'pengukuran' ? 'bg-indigo-200 text-indigo-700' : 'text-gray-500' }}">
        <span class="text-lg">📏</span> <span>Pengukuran</span>
    </a>
    
    <a href="{{ route('riwayat') }}" class="flex flex-col items-center w-20 py-2 rounded-lg {{ $currentRoute == 'riwayat' ? 'bg-indigo-200 text-indigo-700' : 'text-gray-500' }}">
        <span class="text-lg">📅</span> <span>Riwayat</span>
    </a>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex flex-col items-center w-20 py-2 text-gray-500">
            <span class="text-lg">🚪</span> <span>Logout</span>
        </button>
    </form>
</nav>
