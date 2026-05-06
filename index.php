<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login LMS</title>

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="dist/assets/main-CdPv3Vwp.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">
        <div class="bg-white shadow-xl rounded-3xl p-8 border border-slate-200">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-slate-800">
                    LMS By Yue
                </h1>
                <p class="text-slate-500 mt-2 text-sm">
                    Masuk untuk melanjutkan
                </p>
            </div>
            <form id="loginForm" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Username
                    </label>

                    <input
                        type="text"
                        id="username"
                        placeholder="Masukkan username"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                        required>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        placeholder="Masukkan password"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                        required>
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition duration-300 shadow-lg shadow-green-200">
                    Login
                </button>

            </form>

        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-slate-500 mt-6">
            © 2026 LMS By Yue. All rights reserved.
        </p>

    </div>

    <script src="asset/js/login.js"></script>

</body>

</html>