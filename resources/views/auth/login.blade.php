<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laman Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-xl p-6">
      <!-- Header -->
      <div class="flex justify-between items-center mb-5">
        <h1 class="font-bold text-lg">Home Care</h1>
      </div>

      <!-- Form Login -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-3 text-center">Login</h3>
        
        @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: '{{ session("error") }}',
                confirmButtonColor: '#d33'
            });
        </script>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-3">
          @csrf
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Email</label
            >
            <input
              type="email"
              name="email"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Email Anda"
              required
            />
          </div>
          <div>
            <label class="block text-left text-sm font-medium text-gray-600"
              >Password</label
            >
            <input
              type="password"
              name="password"
              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="********"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700"
          >
            Masuk
          </button>
        </form>
        <p class="text-center text-sm text-gray-600 mt-3">
          Belum punya akun?
          <a href="{{ route('register') }}" class="text-indigo-600 hover:underline"
            >Daftar di sini</a
          >
        </p>
      </div>
    </div>
  </body>
</html>
