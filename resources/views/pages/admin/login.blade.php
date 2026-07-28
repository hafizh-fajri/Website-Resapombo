<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-200">
        <div class="text-center mb-8">
            <!-- Menggunakan text-[#166534] -->
            <h1 class="text-3xl font-bold text-[#166534] mb-2">Desa Resapombo</h1>
            <p class="text-gray-500">Panel Administrasi Website</p>
        </div>

        <form action="{{ route('admin.login') }}" method="POST">
            <!-- Wajib untuk keamanan form di Laravel -->
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                <input type="text" id="username" name="username" required 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-[#115e59] focus:border-[#115e59] outline-none transition-all">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input type="password" id="password" name="password" required 
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-[#115e59] focus:border-[#115e59] outline-none transition-all">
            </div>

            <button type="submit" 
                class="w-full bg-[#166534] text-white font-semibold py-3 px-4 rounded-lg hover:bg-[#115e59] transition-colors duration-300 shadow-sm">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>