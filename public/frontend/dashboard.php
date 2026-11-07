<!DOCTYPE html>
<html lang="id">
<head>
   
   <?php include 'head.php';?> 
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>

        * {
            transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, color 0.2s ease;
        }
       
        body.mode-solid {
            background-color: #f1f5f9;
            color: #1e293b;
        }
        body.mode-solid .app-sidebar {
            background-color: #1E3A8A;
            color: #ffffff;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        body.mode-solid .app-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        }
        body.mode-solid .nav-item-active {
            background-color: #ffffff;
            color: #1E3A8A;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        body.mode-solid .banner-card {
            background: linear-gradient(135deg, #1E3A8A 0%, #024CAA 50%, #2563EB 100%);
            color: #ffffff;
        }

        body.mode-glass {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #1e3a8a 100%);
            background-attachment: fixed;
            color: #f8fafc;
        }
        body.mode-glass .app-sidebar {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            color: #f8fafc;
        }
        body.mode-glass .app-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            color: #f8fafc;
        }
        body.mode-glass .text-slate-800, body.mode-glass .text-slate-700 {
            color: #f8fafc !important;
        }
        body.mode-glass .text-slate-500, body.mode-glass .text-slate-400 {
            color: #cbd5e1 !important;
        }
        body.mode-glass .bg-slate-50, body.mode-glass .bg-slate-100 {
            background-color: rgba(255, 255, 255, 0.08) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
        body.mode-glass .nav-item-active {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            color: #ffffff;
            font-weight: 700;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        body.mode-glass .banner-card {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.6) 0%, rgba(245, 158, 11, 0.3) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="mode-solid font-sans antialiased min-h-screen p-3 sm:p-5 lg:p-6">
    <?php include 'navbarDashboard.php';?>

        <main class="flex-grow flex flex-col gap-6">

            <header class="app-card p-4 sm:p-5 rounded-[2rem] flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <h1 class="text-xl sm:text-2xl font-black text-slate-800 tracking-tight flex items-center gap-2">
                        Dashboard Pengguna
                    </h1>
                    <p class="text-xs text-slate-500 font-medium">Layanan Pemesanan & Status Bus DAMRI Universitas Sriwijaya</p>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <div class="relative flex-grow sm:flex-grow-0 sm:w-72">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" id="searchInput" placeholder="Cari jadwal, tiket, atau rute..." class="w-full pl-10 pr-4 py-2.5 bg-slate-100 border border-slate-200 rounded-2xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-all">
                    </div>

                    <button id="notif-btn" class="relative w-10 h-10 rounded-2xl bg-slate-100 border border-slate-200 text-slate-700 flex items-center justify-center hover:bg-slate-200 transition-all shrink-0 cursor-pointer">
                        <i class="fa-solid fa-bell text-sm"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white font-black text-[9px] rounded-full flex items-center justify-center">2</span>
                    </button>

                    <button id="profile-btn" class="w-10 h-10 rounded-2xl bg-damri-navy text-white flex items-center justify-center font-bold text-xs shrink-0 hover:bg-blue-900 transition-all cursor-pointer">
                        <i class="fa-solid fa-user"></i>
                    </button>
                </div>
            </header>

            <section class="banner-card p-6 sm:p-8 rounded-[2.5rem] relative overflow-hidden shadow-xl">
                <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center relative z-10">
                    <div class="md:col-span-8 space-y-3">
                        <span class="px-3 py-1 bg-amber-500 text-damri-navy font-black text-[10px] uppercase tracking-wider rounded-full inline-block shadow-sm">
                            Status Hari Ini
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-black tracking-tight leading-tight">
                            Selamat Datang, Rasyid! 
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-200 leading-relaxed max-w-xl">
                            Anda memiliki <b>2 tiket aktif</b> untuk keberangkatan bus DAMRI rute Kampus Indralaya & Bukit hari ini. Pastikan hadir 10 menit sebelum jam keberangkatan.
                        </p>

                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href = "index.php" ><button id="btn-pesan" class="px-5 py-3 bg-amber-500 hover:bg-amber-600 text-damri-navy font-extrabold text-xs rounded-2xl shadow-lg transition-all flex items-center gap-2 transform hover:-translate-y-0.5 cursor-pointer">
                                <i class="fa-sharp fa-regular fa-backward text-sm"></i>
                                <span> Landing Page</span>
                            </button></a>
                            <button id="btn-jadwal" class="px-5 py-3 bg-white/15 hover:bg-white/25 text-white font-bold text-xs rounded-2xl border border-white/20 backdrop-blur-md transition-all cursor-pointer">
                                <i class="fa-solid fa-clock mr-1.5"></i> Cek Jadwal Bus
                            </button>
                        </div>
                    </div>

                    <div class="md:col-span-4 flex justify-center md:justify-end">
                        <div class="w-36 h-36 sm:w-44 sm:h-44 gap-2 bg-white/10 rounded-3xl border border-white/20 backdrop-blur-md flex flex-col items-center justify-center p-4 text-center shadow-inner">
                            <img src="../images/logo_damri.png" alt="" class="relative right-[4px] w-[250px]">
                            <span class="text-xs font-extrabold text-white">DAMRI UNSRI</span>
                            <span class="text-[10px] text-amber-200 font-medium relative -top-[3px]">Terintegrasi 24/7</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="app-card p-5 rounded-[2rem] flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-semibold text-slate-500 block">Total Tiket Dipesan</span>
                        <div class="flex items-baseline gap-2 mt-0.5">
                            <span class="text-xl font-black text-slate-800">12 Tiket</span>
                            <span class="text-[10px] font-bold text-emerald-500"><i class="fa-solid fa-arrow-up"></i> +18%</span>
                        </div>
                    </div>
                </div>

                <div class="app-card p-5 rounded-[2rem] flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-route"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-semibold text-slate-500 block">Perjalanan Aktif</span>
                        <div class="flex items-baseline gap-2 mt-0.5">
                            <span class="text-xl font-black text-slate-800">2 Rute</span>
                            <span class="text-[10px] font-bold text-amber-500">Hari ini</span>
                        </div>
                    </div>
                </div>

                <div class="app-card p-5 rounded-[2rem] flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-semibold text-slate-500 block">Saldo Poin Mahasiswa</span>
                        <div class="flex items-baseline gap-2 mt-0.5">
                            <span class="text-xl font-black text-slate-800">Rp 45.000</span>
                        </div>
                    </div>
                </div>

                <div class="app-card p-5 rounded-[2rem] flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-semibold text-slate-500 block">Tingkat Tepat Waktu</span>
                        <div class="flex items-baseline gap-2 mt-0.5">
                            <span class="text-xl font-black text-slate-800">98.4%</span>
                            <span class="text-[10px] font-bold text-emerald-500"><i class="fa-solid fa-check"></i> Sangat Baik</span>
                        </div>
                    </div>
                </div>
            </section>


            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <section class="lg:col-span-8 space-y-6">
                    <div class="app-card p-6 rounded-[2.5rem]">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h3 class="text-base font-extrabold text-slate-800">Tiket Keberangkatan Anda</h3>
                                <p class="text-xs text-slate-500">Daftar tiket bus aktif yang dapat digunakan hari ini</p>
                            </div>
                            <a href="#tiket" class="text-xs font-bold text-amber-600 hover:underline flex items-center gap-1">
                                Lihat Semua <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        </div>

                        <div class="space-y-3.5" id="ticketList">
                            <div class="ticket-item p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-code="DMR-UNS-082">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-11 h-11 rounded-xl bg-damri-navy text-amber-400 font-bold flex items-center justify-center text-sm shrink-0">
                                        <i class="fa-solid fa-bus"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-extrabold text-xs text-slate-800">Kampus Bukit → Indralaya</span>
                                            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 font-bold text-[9px] rounded-full">Aktif</span>
                                        </div>
                                        <p class="text-[11px] text-slate-500 mt-0.5">
                                             <i class="fa-regular fa-clock mr-1"></i> Keberangkatan: <b>07:00 WIB</b> • Bus 01 Express
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between sm:justify-end gap-3 border-t sm:border-t-0 pt-2 sm:pt-0 border-slate-200">
                                    <div class="text-left sm:text-right">
                                        <span class="text-[10px] text-slate-400 block">Kode Tiket</span>
                                        <span class="font-mono font-bold text-xs text-damri-navy">DMR-UNS-082</span>
                                    </div>
                                    <button class="btn-qr px-3.5 py-2 bg-damri-navy hover:bg-blue-900 text-white font-bold text-xs rounded-xl shadow transition-all cursor-pointer">
                                        Lihat QR
                                    </button>
                                </div>
                            </div>

                            <div class="ticket-item p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-code="DMR-UNS-094">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-11 h-11 rounded-xl bg-amber-500 text-damri-navy font-bold flex items-center justify-center text-sm shrink-0">
                                        <i class="fa-solid fa-bus"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-extrabold text-xs text-slate-800">Kampus Indralaya → Bukit</span>
                                            <span class="px-2 py-0.5 bg-amber-100 text-amber-800 font-bold text-[9px] rounded-full">Menunggu</span>
                                        </div>
                                        <p class="text-[11px] text-slate-500 mt-0.5">
                                             <i class="fa-regular fa-clock mr-1"></i> Keberangkatan: <b>16:00 WIB</b> • Bus 04 Sore
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between sm:justify-end gap-3 border-t sm:border-t-0 pt-2 sm:pt-0 border-slate-200">
                                    <div class="text-left sm:text-right">
                                        <span class="text-[10px] text-slate-400 block">Kode Tiket</span>
                                        <span class="font-mono font-bold text-xs text-damri-navy">DMR-UNS-094</span>
                                    </div>
                                    <button class="btn-qr px-3.5 py-2 bg-damri-navy hover:bg-blue-900 text-white font-bold text-xs rounded-xl shadow transition-all cursor-pointer">
                                        Lihat QR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="lg:col-span-4 space-y-6">
                    <div class="app-card p-6 rounded-[2.5rem]">
                        <h3 class="text-base font-extrabold text-slate-800 mb-1">Status Bus Real-Time</h3>
                        <p class="text-xs text-slate-500 mb-4">Posisi armada bus DAMRI UNSRI aktif</p>

                        <div class="space-y-3">
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-xs text-slate-800 flex items-center gap-1.5">
                                        <i class="fa-solid fa-circle text-[8px] text-emerald-500"></i> Bus 01 Indralaya Express
                                    </span>
                                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[9px] font-bold rounded-full">Di Jalan</span>
                                </div>
                                <div class="text-[11px] text-slate-500 flex justify-between">
                                    <span>Posisi: Tol Palindra Km 12</span>
                                    <span class="font-bold text-damri-navy">ETA 12 Min</span>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-xs text-slate-800 flex items-center gap-1.5">
                                        <i class="fa-solid fa-circle text-[8px] text-amber-500"></i> Bus 02 Bukit Line
                                    </span>
                                    <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-[9px] font-bold rounded-full">Halte Bukit</span>
                                </div>
                                <div class="text-[11px] text-slate-500 flex justify-between">
                                    <span>Posisi: Persiapan Boarding</span>
                                    <span class="font-bold text-amber-600">Standby</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-5 border-t border-slate-200">
                            <h4 class="text-xs font-extrabold text-slate-700 mb-3">Rute Favorit Anda</h4>
                            <div class="flex flex-col gap-2">
                                <button class="btn-route w-full p-2.5 rounded-xl bg-slate-100 hover:bg-amber-500/10 hover:border-amber-500 text-left text-xs font-bold text-slate-700 flex items-center justify-between transition-all border border-transparent cursor-pointer" data-route="Bukit → Indralaya">
                                    <span>Bukit → Indralaya</span>
                                    <i class="fa-solid fa-arrow-right text-amber-500"></i>
                                </button>
                                <button class="btn-route w-full p-2.5 rounded-xl bg-slate-100 hover:bg-amber-500/10 hover:border-amber-500 text-left text-xs font-bold text-slate-700 flex items-center justify-between transition-all border border-transparent cursor-pointer" data-route="Indralaya → Bukit">
                                    <span>Indralaya → Bukit</span>
                                    <i class="fa-solid fa-arrow-right text-amber-500"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <div id="toast" class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none text-xs">
        <i id="toastIcon" class="fa-solid fa-circle-check text-amber-400 text-base"></i>
        <span id="toastMsg" class="font-medium">Notifikasi</span>
    </div>

    <script src="js/dashboard.js"></script>
</body>
</html>