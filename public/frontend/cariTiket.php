<!DOCTYPE html>
<html lang="id">
<head>
   <?php include 'head.php';?>
     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
        :focus-visible { outline: 2px solid #F59E0B; outline-offset: 2px; }
        .bus-card { border-bottom: 1px solid #e2e8f0; }
        .bus-card:last-child { border-bottom-color: transparent; }
        @media print {
            body * { visibility: hidden; }
            #ticketDetailModal, #ticketDetailModal * { visibility: visible; }
            #ticketDetailModal { position: absolute; inset: 0; background: #fff; }
            .no-print { display: none !important; }
        }
        .btn:hover{
            transform : scale(1.05);
        }
    </style>
</head>
<body class="bg-[#F0F4F8] min-h-screen text-slate-700 antialiased flex flex-col">
 
    <!-- Header -->
    <header class="bg-damri-navy w-full flex justify-between items-center">
        <div class="max-w-6xl px-4 sm:px-6 lg:px-8 pt-5 pb-16 sm:pb-25 flex flex-col ml-[90px]">
            <a href="index.php" class="inline-flex itsems-center gap-2 text-sm text-blue-100 hover:text-white self-start">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke beranda
            </a>
            <h1 class="mt-5 text-2xl sm:text-3xl font-bold text-white">Cari tiket bus kampus</h1>
            <p class="mt-1 text-sm sm:text-base text-blue-100">DAMRI Unsri antara Bukit dan Indralaya.</p>
        </div>
        <div class="flex lg:mr-[40px]">
        <a href="history.php" class="block">
        <button class="btn flex items-center justify-center w-[130px] h-[35px] lg:w-[163px] bg-damri-amber hover:bg-damri-amberHover transition-all duration-200 px-[10px] rounded-md shadow-md text-damri-navy">
            <span class="mr-[6px] lg:mr-[8px] font-sans font-[600] text-[13px] lg:text-[16px] text-damri-navy whitespace-nowrap">History Tiket</span>
            <i class="fa-solid fa-clock-rotate-left text-[16px] lg:text-[19px]"></i>
        </button>
    </a>
</div>

    </header>
 
    <main class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 -mt-8 sm:-mt-10 pb-16 flex flex-col gap-6 w-full">
 
        <!-- Panel Pencarian (Flexbox) -->
        <section class="bg-white rounded-lg border border-slate-200 shadow-sm p-4 sm:p-5 flex flex-col md:flex-row items-stretch md:items-end gap-3">
            <div class="flex-1 flex flex-col">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Dari</label>
                <div class="relative flex items-center">
                    <i class="fa-solid fa-location-dot absolute left-3 text-amber-500 text-sm"></i>
                    <select id="asalSelect" class="h-11 w-full appearance-none rounded-md border border-slate-300 bg-white pl-9 pr-9 text-sm font-medium cursor-pointer">
                        <option value="Halte Unsri Bukit">Halte Unsri Bukit</option>
                        <option value="Terminal Unsri Indralaya">Terminal Unsri Indralaya</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3 text-xs text-slate-400 pointer-events-none"></i>
                </div>
            </div>
 
            <button type="button" id="swapRouteBtn" class="h-11 w-11 self-center rounded-md border border-slate-300 bg-white text-navy hover:bg-slate-50 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-arrow-right-arrow-left text-sm rotate-90 md:rotate-0"></i>
            </button>
 
            <div class="flex-1 flex flex-col">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Ke</label>
                <div class="relative flex items-center">
                    <i class="fa-solid fa-flag-checkered absolute left-3 text-navy text-sm"></i>
                    <select id="tujuanSelect" class="h-11 w-full appearance-none rounded-md border border-slate-300 bg-white pl-9 pr-9 text-sm font-medium cursor-pointer">
                        <option value="Terminal Unsri Indralaya" selected>Terminal Unsri Indralaya</option>
                        <option value="Halte Unsri Bukit">Halte Unsri Bukit</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3 text-xs text-slate-400 pointer-events-none"></i>
                </div>
            </div>
 
            <div class="flex-1 flex flex-col">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jam berangkat</label>
                <div class="relative flex items-center">
                    <i class="fa-regular fa-clock absolute left-3 text-emerald-600 text-sm"></i>
                    <select id="jamInput" class="h-11 w-full appearance-none rounded-md border border-slate-300 bg-white pl-9 pr-9 text-sm font-medium cursor-pointer">
                        <option value="">Semua jam</option>
                        <option value="06">06:00 - 06:59</option>
                        <option value="07">07:00 - 07:59</option>
                        <option value="08">08:00 - 08:59</option>
                        <option value="09">09:00 - 09:59</option>
                        <option value="10">10:00 - 10:59</option>
                        <option value="11">11:00 - 11:59</option>
                        <option value="12">12:00 - 12:59</option>
                        <option value="13">13:00 - 13:59</option>
                        <option value="14">14:00 - 14:59</option>
                        <option value="15">15:00 - 15:59</option>
                        <option value="16">16:00 - 16:59</option>
                        <option value="17">17:00 - 17:59</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3 text-xs text-slate-400 pointer-events-none"></i>
                </div>
            </div>
        </section>
 
        <!-- Judul Hasil -->
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between">
            <div class="flex flex-col">
                <h2 class="text-xl font-bold text-slate-900 ml-[40px]">Jadwal bus</h2>
                <p id="resultSubtitle" class="text-sm text-slate-500 ml-[40px]">Menampilkan jadwal bus</p>
            </div>
        </div>
 
        <!-- Wadah Daftar Bus -->
        <div id="busListContainer" class="overflow-hidden rounded-lg border border-slate-200 bg-white flex flex-col">
            <!-- Hasil generate JS muncul di sini -->
        </div>
    </main>
 
    <!-- MODAL PILIH METODE PEMBAYARAN -->
    <div id="paymentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 p-4" style="display: none;" role="dialog">
        <div class="max-h-[92vh] w-full max-w-sm flex flex-col overflow-y-auto rounded-lg bg-white shadow-xl">
            <div class="flex items-start justify-between border-b border-slate-200 px-5 py-4">
                <div class="flex flex-col">
                    <h3 class="font-bold text-slate-900">Pilih Metode Pembayaran</h3>
                    <p class="text-xs text-slate-500">Tarif mahasiswa: <span id="paymentPrice" class="font-bold text-amber-700">Rp 15.000</span></p>
                </div>
                <button type="button" id="closePaymentModalBtn" class="h-8 w-8 rounded-md text-slate-500 hover:bg-slate-100 flex items-center justify-center"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-5 flex flex-col gap-3">
                <label class="flex items-center gap-3 p-3 rounded-md border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="radio" name="metode" value="QRIS" checked class="text-navy">
                    <div class="flex-1 flex flex-col text-sm"><p class="font-bold text-slate-900">QRIS</p><p class="text-xs text-slate-500">Scan via GoPay, OVO, Dana, dll</p></div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-md border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="radio" name="metode" value="Bank BCA" class="text-navy">
                    <div class="flex-1 flex flex-col text-sm"><p class="font-bold text-slate-900">BCA (Transfer Bank)</p><p class="text-xs text-slate-500">Virtual Account / Transfer manual</p></div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-md border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="radio" name="metode" value="Bank Sumsel Babel" class="text-navy">
                    <div class="flex-1 flex flex-col text-sm"><p class="font-bold text-slate-900">Bank Sumsel Babel</p><p class="text-xs text-slate-500">Bank daerah resmi Sumatera Selatan</p></div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-md border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="radio" name="metode" value="DANA" class="text-navy">
                    <div class="flex-1 flex flex-col text-sm"><p class="font-bold text-slate-900">DANA</p><p class="text-xs text-slate-500">Pembayaran instan aplikasi DANA</p></div>
                </label>
            </div>
            <div class="border-t border-slate-200 p-4">
                <button type="button" id="confirmPaymentBtn" class="w-full h-11 rounded-md bg-amber-500 text-sm font-bold text-slate-900 hover:bg-amber-400 shadow-sm">Konfirmasi & Terbitkan Tiket</button>
            </div>
        </div>
    </div>
 
    <!-- MODAL E-TIKET -->
    <div id="ticketDetailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 p-4" style="display: none;" role="dialog">
        <div class="max-h-[92vh] w-full max-w-sm flex flex-col overflow-y-auto rounded-lg bg-white shadow-xl">
            <div class="flex items-start justify-between bg-navy px-5 py-4 text-white">
                <div class="flex flex-col">
                    <p class="text-sm font-semibold text-emerald-300"><i class="fa-solid fa-circle-check"></i> Pemesanan berhasil</p>
                    <h3 class="mt-1 text-lg font-bold">E-tiket DAMRI Unsri</h3>
                </div>
                <button type="button" id="closeTicketModalBtn" class="no-print h-8 w-8 rounded-md text-blue-100 hover:bg-white/10 flex items-center justify-center"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-5 flex flex-col gap-4">
                <div class="rounded-md border border-slate-200 bg-slate-50 py-3 flex flex-col items-center justify-center text-center">
                    <svg id="barcodeElement"></svg>
                    <p id="ticketCodeText" class="mt-1 font-bold tracking-widest text-slate-600 text-sm">DMR-000000</p>
                </div>
                <div class="flex justify-between text-sm">
                    <div class="flex flex-col"><p class="text-xs text-slate-500 font-semibold">Dari</p><p id="ticketAsal" class="font-bold text-slate-800"></p></div>
                    <div class="text-right flex flex-col"><p class="text-xs text-slate-500 font-semibold">Tujuan</p><p id="ticketTujuan" class="font-bold text-slate-800"></p></div>
                </div>
                <div class="flex flex-col gap-2 border-t border-dashed border-slate-300 pt-4 text-sm">
                    <div class="flex justify-between">
                        <div class="flex flex-col"><span class="text-xs text-slate-500">Jam berangkat</span><span id="ticketJam" class="font-bold text-slate-800"></span></div>
                        <div class="flex flex-col text-right"><span class="text-xs text-slate-500">Metode Bayar</span><span id="ticketMetode" class="font-bold text-navy"></span></div>
                    </div>
                </div>
            </div>
            <div class="no-print flex gap-2 border-t border-slate-200 p-4">
                <button type="button" onclick="window.print()" class="h-11 flex-1 rounded-md border border-slate-300 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cetak</button>
                <button type="button" id="finishTicketBtn" class="h-11 flex-1 rounded-md bg-navy text-sm font-bold text-white shadow-sm">Selesai</button>
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script src = "js/cariTiket.js"></script>
</body>
</html>