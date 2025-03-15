<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-xl p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-5">
            <h1 class="font-bold text-lg">Home Care</h1>
        </div>

        <!-- Form Register -->
        <div class="bg-gray-50 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-3 text-center">Register</h3>

            <!-- Pesan sukses -->
            @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Registrasi Berhasil!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "{{ route('login') }}";
                });
            </script>
            @endif

            <!-- Pesan error dari session -->
            @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Registrasi Gagal!',
                    text: '{{ session("error") }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            </script>
            @endif

            <!-- Menampilkan error validasi -->
            @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    html: `<ul class="text-left">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>`,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            </script>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Nama Anda" />
                </div>
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Email Anda" />
                </div>
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="********" />
                </div>
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="********" />
                </div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                    Daftar
                </button>
            </form>
            <p class="text-center text-sm text-gray-600 mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login di sini</a>
            </p>
        </div>
    </div>
</body>
</html>
