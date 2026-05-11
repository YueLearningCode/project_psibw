<?php

require_once '../config/config.php';

session_start();

$users = null;

if (isset($_SESSION['users'])) {
    $users = $_SESSION['users'];
} elseif (isset($_COOKIE['users'])) {
    $users = json_decode($_COOKIE['users'], true);
    $_SESSION['users'] = $users;
}

if (!$users) {
    header('Location: ../index.php');
    exit;
}
$role = $users['role'] ?? null;

$role = $role ? trim(strtolower($role)) : null;

// Debug: uncomment to see what's happening
// echo "Role: " . $role . "<br>";
// echo "Session users: " . print_r($_SESSION['users'], true) . "<br>";
// exit;

$allowedRoles = ['admin', 'dosen', 'mahasiswa'];
if (!$role || !in_array($role, $allowedRoles)) {
    echo "Invalid role: '" . htmlspecialchars($role) . "'<br>";
    echo "Allowed roles: " . implode(', ', $allowedRoles) . "<br>";
    echo "Session data: " . print_r($_SESSION['users'], true) . "<br>";
    echo "Cookie data: " . (isset($_COOKIE['users']) ? $_COOKIE['users'] : 'none') . "<br>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD Dashboard - <?php echo ucfirst($role); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F4F7F6;
            /* Background Off-white Gambar 2 */
        }

        .sidebar-active {
            background-color: #004D39;
            /* Hijau Botol Gambar 2 */
            color: white !important;
        }

        .glass-card {
            background: white;
            border-radius: 2rem;
            /* Extra Rounded Gambar 2 */
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.02);
        }

        .stat-icon {
            border-radius: 1.2rem;
        }
    </style>
</head>

<body class="text-slate-800">

    <aside class="fixed h-full w-[250px] bg-white border-r border-slate-100 flex flex-col z-50">
        <div class="p-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#004D39] rounded-xl flex items-center justify-center shadow-lg shadow-emerald-900/20">
                    <span class="material-symbols-rounded text-white">school</span>
                </div>
                <span class="text-xl font-bold tracking-tighter text-[#004D39]">SIAKAD</span>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-1">
            <?php if ($role === 'admin'): ?>
                <a href="#dashboard" class="sidebar-active flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                    <span class="material-symbols-rounded">grid_view</span> Dashboard
                </a>
                <div class="pt-4 pb-2 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Master Data</div>
                <a href="#mahasiswa" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded text-[20px]">person_4</span> Data Mahasiswa
                </a>
                <a href="#dosen" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded text-[20px]">co_present</span> Data Dosen
                </a>
                <a href="#kuliah" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded text-[20px]">auto_stories</span> Data Mata Kuliah
                </a>
                <div class="pt-4 pb-2 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Akademik</div>
                <a href="#jadwal" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded text-[20px]">calendar_month</span> Jadwal Kuliah
                </a>
                <a href="#password" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded text-[20px]">lock_reset</span> Ganti Password
                </a>

            <?php elseif ($role === 'dosen'): ?>
                <a href="#dashboard" class="sidebar-active flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold">
                    <span class="material-symbols-rounded">grid_view</span> Dashboard
                </a>
                <a href="#mahasiswa" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50">
                    <span class="material-symbols-rounded">groups</span> Mahasiswa Bimbingan
                </a>
                <a href="#jadwal" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50">
                    <span class="material-symbols-rounded">event_note</span> Jadwal Mengajar
                </a>

            <?php elseif ($role === 'mahasiswa'): ?>
                <a href="#dashboard" class="sidebar-active flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold">
                    <span class="material-symbols-rounded">grid_view</span> Dashboard
                </a>
                <a href="#krs" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50">
                    <span class="material-symbols-rounded">edit_document</span> Input KRS
                </a>
                <a href="#khs" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50">
                    <span class="material-symbols-rounded">grade</span> Hasil Studi (KHS)
                </a>
            <?php endif; ?>
        </nav>

        <div class="p-6">
            <button onclick="logout()" class="w-full flex items-center gap-2 px-4 py-3 text-sm font-bold text-rose-500 bg-rose-50 rounded-2xl hover:text-white hover:bg-rose-600 transition-all">
                <span class="material-symbols-rounded text-lg">logout</span> Logout
            </button>
        </div>
    </aside>

    <div class="ml-[250px] min-h-screen">

        <header class="h-20 px-8 flex justify-between items-center bg-transparent">
            <div class="relative w-80">
                <span class="material-symbols-rounded absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                <input type="text" placeholder="Cari data mahasiswa atau dosen..." class="w-full pl-12 pr-4 py-3 bg-white border-none rounded-2xl text-sm shadow-sm focus:ring-2 focus:ring-[#004D39]/10 outline-none">
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-xs font-bold text-[#004D39] uppercase"><?php echo $role; ?></p>
                    <p class="text-sm font-extrabold text-slate-900"><?php echo htmlspecialchars($users['username']); ?></p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-[#004D39] flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-900/20">
                    <?php echo substr($users['username'], 0, 1); ?>
                </div>
            </div>
        </header>

        <main class="p-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Selamat Pagi, <?php echo htmlspecialchars($users['username']); ?> ☀️</h1>
                    <p class="text-slate-500 text-sm mt-1">Berikut adalah ringkasan aktivitas akademik hari ini.</p>
                </div>
                <button class="bg-[#D1FAE5] text-[#065F46] px-5 py-2.5 rounded-2xl text-sm font-bold flex items-center gap-2 hover:bg-emerald-200 transition-all">
                    <span class="material-symbols-rounded text-sm">download_2</span> Cetak Laporan
                </button>
            </div>

            <div class="bg-[#004D39] glass-card p-10 mb-8 relative overflow-hidden text-white border-none shadow-emerald-900/10 shadow-2xl">
                <div class="relative z-10 max-w-lg">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-2 py-1 bg-emerald-500/20 rounded text-[10px] font-bold tracking-widest border border-emerald-500/30">PENGUMUMAN</span>
                    </div>
                    <h2 class="text-3xl font-medium leading-tight text-emerald-50">Input Nilai Semester Genap meningkat <span class="font-extrabold text-emerald-400">85%</span> minggu ini.</h2>
                </div>
                <button class="absolute right-10 top-1/2 -translate-y-1/2 bg-emerald-400 text-[#004D39] px-6 py-3 rounded-full text-sm font-bold flex items-center gap-2 hover:scale-105 transition-all">
                    Lihat Detail <span class="material-symbols-rounded">arrow_forward</span>
                </button>
            </div>

            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="glass-card p-7 flex flex-col justify-between h-48">
                        <div class="p-3 bg-emerald-50 text-emerald-600 w-fit stat-icon">
                            <span class="material-symbols-rounded">group</span>
                        </div>
                        <div>
                            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Mahasiswa</p>
                            <h2 class="text-3xl font-extrabold mt-1">1,250</h2>
                        </div>
                    </div>

                    <div class="glass-card p-7 flex flex-col justify-between h-48">
                        <div class="p-3 bg-blue-50 text-blue-600 w-fit stat-icon">
                            <span class="material-symbols-rounded">person_search</span>
                        </div>
                        <div>
                            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Dosen Aktif</p>
                            <h2 class="text-3xl font-extrabold mt-1">86</h2>
                        </div>
                    </div>

                    <div class="glass-card p-7 flex flex-col justify-between h-48">
                        <div class="p-3 bg-orange-50 text-orange-600 w-fit stat-icon">
                            <span class="material-symbols-rounded">book</span>
                        </div>
                        <div>
                            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Mata Kuliah</p>
                            <h2 class="text-3xl font-extrabold mt-1">45</h2>
                        </div>
                    </div>
                </div>

                <div class="col-span-4 bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-50">
                    <h3 class="text-lg font-bold mb-6">Informasi Aset</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-[#F0FDFA] p-5 rounded-3xl border border-emerald-50">
                            <p class="text-[10px] text-emerald-800 font-bold uppercase">Staff</p>
                            <h4 class="text-2xl font-bold mt-1">12</h4>
                        </div>
                        <div class="bg-[#F5F3FF] p-5 rounded-3xl border border-violet-50">
                            <p class="text-[10px] text-violet-800 font-bold uppercase">Ruangan</p>
                            <h4 class="text-2xl font-bold mt-1">24</h4>
                        </div>
                        <div class="bg-[#FFF7ED] p-5 rounded-3xl border border-orange-50">
                            <p class="text-[10px] text-orange-800 font-bold uppercase">Proyek</p>
                            <h4 class="text-2xl font-bold mt-1">8</h4>
                        </div>
                        <div class="bg-[#F0F9FF] p-5 rounded-3xl border border-blue-50">
                            <p class="text-[10px] text-blue-800 font-bold uppercase">Event</p>
                            <h4 class="text-2xl font-bold mt-1">3</h4>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        function logout() {
            if (confirm('Yakin ingin keluar?')) {
                fetch('api/logout.php', {
                        method: 'POST'
                    })
                    .then(() => {
                        localStorage.removeItem('users');
                        window.location.href = '../index.php';
                    });
            }
        }
    </script>
</body>

</html>