<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Konfigurasi warna kustom untuk konsistensi dengan front-end */
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        desa: {
                            green: '#115e59', /* Hijau gelap mirip referensi */
                            light: '#dcfce7',
                            hover: '#0f766e'
                        }
                    }
                }
            }
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-desa-green mb-2">Desa Resapombo</h1>
            <p class="text-gray-500">Panel Administrasi Website</p>
        </div>

        <!-- Form untuk Laravel: tambahkan method="POST" dan @csrf -->
        <form action="/login" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-desa-green focus:border-desa-green outline-none transition">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-desa-green focus:border-desa-green outline-none transition">
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" class="text-desa-green focus:ring-desa-green rounded border-gray-300">
                    <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                </label>
            </div>

            <button type="submit" 
                class="w-full bg-desa-green text-white font-semibold py-2 px-4 rounded-md hover:bg-desa-hover transition duration-300">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>