<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Data Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F4F7F6; }
        .sidebar-active { background-color: #004D39; color: white !important; }
        .glass-card { background: white; border-radius: 2rem; box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.04); }
    </style>
</head>
<body class="text-slate-800">

    <div class="flex min-h-screen">
        
        <aside class="fixed h-full w-[260px] bg-white border-r border-slate-200 flex flex-col z-50">
            <div class="p-8 flex items-center gap-3">
                <div class="w-10 h-10 bg-[#004D39] rounded-xl flex items-center justify-center shadow-lg shadow-emerald-900/20">
                    <span class="material-symbols-rounded text-white">school</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-[#004D39]">SIAKAD</span>
            </div>

            <nav class="flex-1 px-4 space-y-1">
                <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded">grid_view</span> Dashboard
                </a>
                <div class="pt-4 pb-2 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Master Data</div>
                <a href="mahasiswa.php" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded">person_4</span> Data Mahasiswa
                </a>
                <a href="dosen.php" class="sidebar-active flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                    <span class="material-symbols-rounded text-[20px]">co_present</span> Data Dosen
                </a>
                <a href="#kuliah" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-all">
                    <span class="material-symbols-rounded text-[20px]">auto_stories</span> Data Mata Kuliah
                </a>
            </nav>

            <div class="p-6">
                <button class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold text-rose-500 bg-rose-50 rounded-2xl hover:bg-rose-100 transition-all">
                    <span class="material-symbols-rounded text-lg">logout</span> Logout
                </button>
            </div>
        </aside>

        <main class="flex-1 ml-[260px] p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Data Dosen</h1>
                    <p class="text-slate-500 text-sm mt-1">Manajemen data tenaga pendidik dan fungsional.</p>
                </div>
                <button class="bg-[#004D39] text-white px-6 py-3 rounded-2xl text-sm font-bold flex items-center gap-2 hover:bg-emerald-900 transition-all shadow-lg shadow-emerald-900/20">
                    <span class="material-symbols-rounded text-lg">add_reaction</span> Tambah Dosen
                </button>
            </div>

            <div class="bg-white rounded-[2rem] p-6 mb-6 shadow-sm border border-slate-50 flex flex-wrap gap-4 items-center">
                <div class="relative flex-1 min-w-[300px]">
                    <span class="material-symbols-rounded absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input type="text" placeholder="Cari NIDN atau Nama Dosen..." class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-2xl text-sm focus:ring-2 focus:ring-[#004D39]/10 outline-none">
                </div>
                <select class="bg-slate-50 border-none rounded-2xl text-sm font-medium p-3 px-6 outline-none text-slate-600 appearance-none cursor-pointer">
                    <option>Bidang Keahlian</option>
                    <option>Software Engineering</option>
                    <option>Data Science</option>
                </select>
                <select class="bg-slate-50 border-none rounded-2xl text-sm font-medium p-3 px-6 outline-none text-slate-600 appearance-none cursor-pointer">
                    <option>Jabatan</option>
                    <option>Lektor Kepala</option>
                    <option>Lektor</option>
                    <option>Asisten Ahli</option>
                </select>
            </div>

            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-slate-50">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dosen & NIDN</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Bidang Ilmu</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Jabatan</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kontak</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="hover:bg-slate-50/50 transition-all group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-11 h-11 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-[#004D39] font-bold shadow-sm">
                                        DS
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900 leading-tight">Dr. Sarah Smith, M.T.</p>
                                        <p class="text-[11px] text-slate-400 mt-1 font-mono tracking-tighter">NIDN: 0012058501</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-sm font-medium text-slate-600">Sistem Informasi</td>
                            <td class="px-6 py-6 text-center">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100">Lektor Kepala</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-1 text-xs text-slate-500">
                                        <span class="material-symbols-rounded text-xs">mail</span> sarah@univ.ac.id
                                    </div>
                                    <div class="flex items-center gap-1 text-xs text-slate-500">
                                        <span class="material-symbols-rounded text-xs">call</span> +62 812-3456
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center gap-2">
                                    <button class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all" title="View Profile">
                                        <span class="material-symbols-rounded text-lg text-emerald-700">account_box</span>
                                    </button>
                                    <button class="p-2 text-slate-400 hover:bg-slate-100 rounded-xl transition-all">
                                        <span class="material-symbols-rounded text-lg">edit</span>
                                    </button>
                                    <button class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition-all">
                                        <span class="material-symbols-rounded text-lg text-rose-600">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="p-6 bg-slate-50/30 border-t border-slate-50 flex justify-between items-center">
                    <p class="text-xs text-slate-400 font-medium italic">Total: 86 Dosen Aktif</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600">Sebelumnya</button>
                        <button class="px-4 py-2 bg-[#004D39] text-white rounded-xl text-xs font-bold shadow-lg shadow-emerald-900/10">1</button>
                        <button class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 font-mono">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>